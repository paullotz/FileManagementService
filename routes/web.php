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

Route::get("/impressum", function() {
    return view("impressum");
});

Route::get("/kontakt", function() {
    return view("kontakt");
});

Route::get("/home", function() {
    return view("home");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\StorageController::class, 'store'])->name('store');
Route::post('/delete', [App\Http\Controllers\StorageController::class, 'delete'])->name('filedelete');

