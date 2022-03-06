<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Type;
use Hash;
use Auth;

class RegistrationController extends Controller
{
    public function index() {
        $types = Type::all();

        return view('auth.register', [
            'types' => $types, 
        ]);
    }

    public function register(Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'type' => 'required|exists:types,id',
            'email' => 'required|email',
            'password' => 'required|max:20'
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->type_id = $request->input('type');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        Auth::login($user);

        return redirect()->route('profile.index');

    }
}
