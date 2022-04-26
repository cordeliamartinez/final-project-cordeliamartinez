<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\User;
use Auth;

class FavoriteController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'routeid' => 'required|exists:routes,id',
            'routename' => 'required|exists:routes,name',
        ]);

        $favorite = new Favorite();
        $user = Auth::user();

        $favorite->user_id = $user->id;
        $favorite->route_id = $request->input('routeid');

        $favorite->save();

        return redirect()
            ->route('profile.index')
            ->with('success', "Successfully added {$request->input('routename')} to your favorites");
    }

    public function destroy($id) {
        $favorite = Favorite::all()->find($id);

        $favorite->delete();

        return redirect()
            ->route('profile.index')
            ->with('success', "Successfully deleted from your favorites");
    }
}
