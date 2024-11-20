<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userform', [\App\Http\Controllers\EmployeeController::class, 'userform']);
Route::post('/store_form', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('store-user');
Route::post('/store_form_json', [\App\Http\Controllers\EmployeeController::class, 'storeJson']);


Route::get('/user/{id}', [EmployeeController::class, 'get']);

Route::get('/user', [EmployeeController::class, 'index']);
Route::get('/resume/{id}', [PdfController::class, 'index']);

Route::get('/logs', function(){
    return view('logs');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
