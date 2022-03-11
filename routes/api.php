<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
// Authentication
Route::post('register', [UserController::class, 'register'])->name('register');
Route::post('login', [UserController::class, 'login'])->name('login');

// Courses
Route::get('courses', [CourseController::class, 'getCourses'])->name('getCourses');
Route::get('courses/{id}', [CourseController::class, 'getCourseByID'])->name('getCourseByID');

// Categories
Route::get('categories', [CategoryController::class, 'getCategories'])->name('getCategories');

/*
|--------------------------------------------------------------------------
| Private Routes with Sanctum
|--------------------------------------------------------------------------
*/
// Authentication
Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [UserController::class, 'logout'])->name('logout');
});
