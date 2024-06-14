<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class, 'index'])->name('index');
Route::post('/tasks', [TaskController::class, 'store'])->name('store');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('update');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('destroy');
