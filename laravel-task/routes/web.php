<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['checkDueDate'])->put('/tasks/{task}',[TaskController::class,'update'])->name('tasks.update');

Route::get('/tasks',[TaskController::class,'index'])->name('tasks.index');
Route::get('/tasks/create',[TaskController::class,'create'])->name('tasks.create');
Route::post('/tasks/store',[TaskController::class,'store'])->name('tasks.store');
Route::post('/tasks/update',[TaskController::class,'update'])->name('tasks.update');
Route::post('/tasks/destroy',[TaskController::class,'destroy'])->name('tasks.destroy');




