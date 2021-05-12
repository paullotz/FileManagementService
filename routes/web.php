<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

/*Route::get("/search", function() {
    return view("search");
});*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for StorageController
Route::post('/home', [App\Http\Controllers\StorageController::class, 'store'])->name('store');
Route::post('/delete', [App\Http\Controllers\StorageController::class, 'delete'])->name('filedelete');
Route::post('/download', [App\Http\Controllers\StorageController::class, 'download'])->name('downloadfile');

// Routes for SettingsController
Route::get('/einstellungen', [App\Http\Controllers\SettingsController::class, 'loaduser']);
Route::post('/updatedata', [App\Http\Controllers\SettingsController::class, 'updatedata'])->name("updatedata");
Route::post('/changepw', [App\Http\Controllers\SettingsController::class, 'changepw'])->name("changepw");

// Routes for SearchController
Route::get("/search", [\App\Http\Controllers\SearchController::class, "search"])->name("search");

