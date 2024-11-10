<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Models\News;

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

Route::get('news/create-test', function() {
    $news = new News();
    $news->title = 'Test title';
    $news->body = 'test body';
    $news->save();
    return $news;
});

Route::get('news/{id}/hide', function($id) {
    $news = News::findOrFail($id);
    $news->hidden = true;
    $news->save();
    return 'News hidden';
});
