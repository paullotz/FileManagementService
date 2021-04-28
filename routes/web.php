<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/impressum", function() {
    return view("impressum");
});

Route::get("/einstellungen", function() {
    return view("einstellungen");
});

Route::get("/kontakt", function() {
    return view("kontakt");
});

Route::get("/home", function() {
    return view("home");
});

Route::get("/searchFile", function() {
    return view("searchFile");
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home', [App\Http\Controllers\StorageController::class, 'store'])->name('store');
Route::post('/delete', [App\Http\Controllers\StorageController::class, 'delete'])->name('filedelete');

