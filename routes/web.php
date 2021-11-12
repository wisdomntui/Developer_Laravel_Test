<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', function () {
    return view('welcome');
});

// Route for testing QueryFilter feature
Route::post('search', [App\Http\Controllers\BlogController::class, 'search'])->name('search');

// Route for testing polymorphic relationships
Route::get('blog-category/{blog}', [App\Http\Controllers\BlogController::class, 'getBlogCategory'])->name('blog-category');

// Route to handle Meal creation testing
Route::post('create-meal', [App\Http\Controllers\MealController::class, 'create'])->name('create-meal');
