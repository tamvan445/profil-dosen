<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CollegeController;
use App\Http\Controllers\Admin\LecturerController;
use App\Http\Controllers\Admin\CourseController;

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

/**
 * Author: Wildan R.
 * 2021
 * Made with Laravel framework 8.20.1
 */

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

/*****Admin*********************************************************************************** */

Route::get('/home', [HomeController::class, 'index'])->name('home');

/**
 * College Routes
 */

// index and store
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
Route::post('/colleges', [CollegeController::class, 'store']);
// update
Route::get('/colleges/edit/{id}', [CollegeController::class, 'edit']);
Route::post('/colleges/edit', [CollegeController::class, 'update'])->name('colleges.update');
// delete
Route::get('/colleges/destroy/{id}', [CollegeController::class, 'destroy']);

/*****Admin*********************************************************************************** */

/**
 * Lecturer Routes
 */

// index
Route::get('/lecturers', [LecturerController::class, 'index'])->name('lecturers.index');
// store
Route::get('/lecturers/add', [LecturerController::class, 'create'])->name('lecturers.create');
Route::post('/lecturers/add', [LecturerController::class, 'store']);
// update
Route::get('/lecturers/edit/{id}', [LecturerController::class, 'edit']);
Route::post('/lecturers/edit', [LecturerController::class, 'update'])->name('lecturers.update');
// delete
Route::get('/lecturers/destroy/{id}', [LecturerController::class, 'destroy']);
// show
Route::get('/lecturers/show/{id}', [LecturerController::class, 'show']);

/*****Admin*********************************************************************************** */

/**
 * Course Routes
 */

// index and store
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');
Route::post('/courses', [CourseController::class, 'store']);
// update
Route::get('/courses/edit/{id}', [CourseController::class, 'edit']);
Route::post('/courses/edit', [CourseController::class, 'update'])->name('courses.update');
// delete
Route::get('/courses/destroy/{id}', [CourseController::class, 'destroy']);
