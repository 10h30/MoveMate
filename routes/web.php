<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserRegisterController;
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
Route::patch('/task/{task}/toggle', [TaskController::class, 'toggleComplete']);


Route::get('/register', [UserRegisterController::class, 'register']);
Route::post('/register', [UserRegisterController::class, 'store']);

Route::get('/login', [SessionController::class, 'login']);

Route::post('/login', [SessionController::class, 'store']);

Route::post('/logout', [SessionController::class, 'destroy']);