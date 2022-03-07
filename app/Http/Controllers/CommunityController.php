<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Route;
use App\Models\Type;

class CommunityController extends Controller
{
    public function index() {
        $users = User::with(['type', 'route'])->get();

        return view('community.index', [
            'users' => $users,
        ]);

    }

    public function show($id) {
        $user = User::with(['type', 'route'])->find($id);
        $routes = Route::with(['user'])->find($id);

        return view('community.show', [
            'user' => $user,
            'routes' => $routes,
        ]);
    }
}
