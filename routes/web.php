<?php

/**
 * Author: Wildan R.
 * 2021
 * Laravel framework 8.26.1
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\CourseController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/* Admin Routes*/

Route::middleware('auth')->group(function () { /* Auth Midleware (Admin) */

/* Home */

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * College Routes
 */

Route::prefix('colleges')->group(function () {
    Route::get('/', [CollegeController::class, 'index'])->name('colleges.index');
    Route::get('/add', function () { return view('admin.colleges.create'); });
    Route::post('/add', [CollegeController::class, 'store'])->name('colleges.store');
    Route::get('/edit/{id}', [CollegeController::class, 'edit']);
    Route::post('/edit', [CollegeController::class, 'update'])->name('colleges.update');
    Route::get('/destroy/{id}', [CollegeController::class, 'destroy']);
});

/**
 * Lecturer Routes
 */

Route::prefix('lecturers')->group(function () {
    Route::get('/', [LecturerController::class, 'index'])->name('lecturers.index');
    Route::get('/add', [LecturerController::class, 'create'])->name('lecturers.create');
    Route::post('/add', [LecturerController::class, 'store']);
    Route::get('/edit/{id}', [LecturerController::class, 'edit']);
    Route::post('/edit', [LecturerController::class, 'update'])->name('lecturers.update');
    Route::get('/destroy/{id}', [LecturerController::class, 'destroy']);
    Route::get('/show/{id}', [LecturerController::class, 'show']);
});

/**
 * Course Routes
 */

Route::prefix('courses')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/', [CourseController::class, 'store']);
    Route::get('/edit/{id}', [CourseController::class, 'edit']);
    Route::post('/edit', [CourseController::class, 'update'])->name('courses.update');
    Route::get('/destroy/{id}', [CourseController::class, 'destroy']);
});

/* Admin */

/* Auth Midleware (Admin) */ }); 
