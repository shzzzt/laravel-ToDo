<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/login');
});

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout'); //post because it changes server state

Route::middleware('auth.check')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index'])->name('tasks.index'); //get because it retrieves a resource
    Route::get('/tasks/create', [TaskController::class, 'create'])->name('tasks.create'); //get because it shows the create form
    Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store'); //post because it creates a new resource
    Route::get('/tasks/{task}', [TaskController::class, 'show'])->name('tasks.show'); //get because it retrieves a resource
    Route::get('/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit'); //get because it shows the edit form
    Route::put('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update'); //put because it updates an existing resource
    Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy'); //delete because it removes a resource

    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); //get because it retrieves a resource
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); //post because it changes server state
});
