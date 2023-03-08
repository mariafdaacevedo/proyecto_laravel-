<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TaskController;

Route::get('/tasks', [TaskController::class, 'show']);

Route::get('/', function () {
    return view('welcome');
});
