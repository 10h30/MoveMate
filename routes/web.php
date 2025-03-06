<?php

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;


Route::get('/', function () {
    $task = Task::latest('updated_at')->Paginate(20);
    return view('task.index', [
        'tasks' => $task
    ]);
});



Route::get('/task', function () {
    $task = Task::latest('updated_at')->Paginate(20);
    return view('task.index', [
        'tasks' => $task
    ]);
});


Route::get('/task/create', function () {
    $categories = Category::all();
    return view('task.create', [
        'categories' => $categories
    ]);
});

Route::post('/task/create', function () {
    //dd(Auth::id());
    $validatedAtts = request()->validate([
        'name' => ['required'],
        'description' => ['required'],
        'category_id' => ['required'],
        'location' => ['required'],
        'time_estimate' => ['required'],
    ]);
  
    $validatedAtts['user_id'] = Auth::id();

    //dd($validatedAtts);

    $task = Task::create(
        $validatedAtts
    );

    return redirect()->route('task.create')->with('success', 'Task created successfully!');
})->name('task.create');

Route::get('/task/{id}', function ($id) {
    $task = Task::find($id);
    return view('task.show', [
        'task' => $task
    ]);
});

Route::get('/task/{id}/edit', function ($id) {
    $task = Task::find($id);
    $categories = Category::all();
    return view('task.edit', [
        'task' => $task,
        'categories' => $categories
    ]);
});

Route::patch('/task/{id}', function ($id) {
    $task = Task::find($id);
    $validatedAtts = request()->validate([
        'name' => ['required'],
        'description' => ['required'],
        'category_id' => ['required'],
        'location' => ['required'],
        'time_estimate' => ['required'],
    ]);
    //dd($task);
    $task->update($validatedAtts);

    return redirect('/task/'.$task->id);


});



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