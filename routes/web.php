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
Route::prefix('colleges')->group(function () {
// index and store
    Route::get('/', [CollegeController::class, 'index'])->name('colleges.index');
    Route::post('/', [CollegeController::class, 'store']);
// update
    Route::get('/edit/{id}', [CollegeController::class, 'edit']);
    Route::post('/edit', [CollegeController::class, 'update'])->name('colleges.update');
// delete
    Route::get('/destroy/{id}', [CollegeController::class, 'destroy']);
});

/*****Admin*********************************************************************************** */

/**
 * Lecturer Routes
 */

Route::prefix('lecturers')->group(function () {
// index
    Route::get('/', [LecturerController::class, 'index'])->name('lecturers.index');
// store
    Route::get('/add', [LecturerController::class, 'create'])->name('lecturers.create');
    Route::post('/add', [LecturerController::class, 'store']);
// update
    Route::get('/edit/{id}', [LecturerController::class, 'edit']);
    Route::post('/edit', [LecturerController::class, 'update'])->name('lecturers.update');
// delete
    Route::get('/destroy/{id}', [LecturerController::class, 'destroy']);
// show
    Route::get('/show/{id}', [LecturerController::class, 'show']);
});

/*****Admin*********************************************************************************** */

/**
 * Course Routes
 */

Route::prefix('courses')->group(function () {
// index and store
    Route::get('/', [CourseController::class, 'index'])->name('courses.index');
    Route::post('/', [CourseController::class, 'store']);
// update
    Route::get('/edit/{id}', [CourseController::class, 'edit']);
    Route::post('/edit', [CourseController::class, 'update'])->name('courses.update');
// delete
    Route::get('/destroy/{id}', [CourseController::class, 'destroy']);
});
