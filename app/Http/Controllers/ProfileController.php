<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function index()
    {
        $user = User::with(['route', 'favorite', 'type'])->find(Auth::user()->id);
        $favcount = $user->favorite->count();
        $routecount = $user->route->count();

        return view('profile.index', [
            'user' => $user,
            'favcount' => $favcount,
            'routecount' => $routecount,
        ]);
    }
}
