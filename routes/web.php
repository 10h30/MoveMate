<?php

use App\Http\Controllers\TaskController;
use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


Route::get('/', [TaskController::class, 'index']);
Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::get('/task/create', [TaskController::class, 'create']);
Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::post('/task/create', [TaskController::class, 'store'])->name('task.create');
Route::delete('/task/{task}', [TaskController::class, 'destroy']);
Route::get('/task/{task}/edit', [TaskController::class, 'edit']);

Route::patch('/task/{task}', [TaskController::class, 'update']);



Route::get('/login', function () {
    return view('auth.login');
});

Route::post('/login', function () {
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
    return redirect('/task');
});

Route::get('/register', function () {
    return view('auth.register');
});

Route::post('/register', function () {
    //validate
    $validatedAtts = request()->validate([
        'name' => ['required'],
        'email' => ['required'],
        'password' => ['required', Password::min(2), 'confirmed'] 
    ]);
    $user = User::create($validatedAtts);
    Auth::login($user);

});

Route::post('/logout', function() {
    Auth::logout();
    return redirect('/');
});