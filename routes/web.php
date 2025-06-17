<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoalController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::resource('/goals', GoalController::class);
