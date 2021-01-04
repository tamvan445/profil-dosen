<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/**
 * College Routes
 */

// store
Route::get('/colleges', [CollegeController::class, 'index'])->name('colleges.index');
Route::post('/colleges', [CollegeController::class, 'store']);
// update
Route::get('/colleges/edit/{id}', [CollegeController::class, 'edit']);
Route::post('/colleges/edit', [CollegeController::class, 'update'])->name('college.update');
// delete
Route::get('/colleges/del/{id}', [CollegeController::class, 'destroy']);

/******************************************************************************************* */
