<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Route;
use App\Models\User;
use Auth;

class CommentController extends Controller
{

    public function store(Request $request) {
        $request->validate([
            'comment' => 'required|min:5',
        ]);

        $comment = new Comment();

        $comment->route_id = $request->input('route');
        $comment->comment = $request->input('comment');
        $comment->user_id = Auth::user()->id;

        $comment->save();

        return redirect()
            ->route('route.show', ['id' => $request->input('route')])
            ->with('success', "Your comment was successfully posted.");

    }

    public function destroy($id, $routeID) {
        $comment = Comment::all()->find($id);

        $comment->delete();

        return redirect()
            ->route('route.show', ['id' => $routeID])
            ->with('success', "Successfully deleted your comment");
    }
}
