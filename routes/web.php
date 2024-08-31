<?php

use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::post('tasks-update-data/{id}', [TaskController::class,'update'])->name('tasks.update.data');
Route::resource('tasks', TaskController::class);
Route::resource('projects', ProjectController::class);

Route::post('tasks/reorder', [TaskController::class, 'reorder'])->name('tasks.reorder');

