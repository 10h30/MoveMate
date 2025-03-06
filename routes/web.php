<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('task.index');
});


Route::get('/task', function () {
    $task = Task::latest()->Paginate(5);
    return view('task.index', [
        'tasks' => $task
    ]);
});

Route::get('/task/create', function () {
    return view('task.create');
});

Route::post('/task/create', function () {
    
});