<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login() {
        return view('auth.login');
    }
    
    public function store() {
        $validatedAtts = request()->validate([
            'email' => ['required'],
            'password' => ['required'] 
        ]);
        //dd($validatedAtts);

        // Attemp
        if (! Auth::attempt($validatedAtts)) {
            throw ValidationException::withMessages([
                'email' => 'The information does not match'
            ]);
    
        };
    
        // regenerate the session token
        request()->session()->regenerate();
    
        //redirect
        return redirect()->route('task.index');
    }

    public function destroy() {
        Auth::logout();
        return redirect('/');
    }
}
