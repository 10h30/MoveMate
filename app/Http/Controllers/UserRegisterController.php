<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class UserRegisterController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function store() {
         //validate
        $validatedAtts = request()->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required', Password::min(2), 'confirmed'] 
        ]);
        $user = User::create($validatedAtts);
        Auth::login($user);
        return redirect()->route('task.view');
    }
}
