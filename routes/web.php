<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use App\Models\Employee;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/userform', [\App\Http\Controllers\FormProcessor::class, 'index']);
Route::post('/store_form', [\App\Http\Controllers\EmployeeController::class, 'store'])->name('store-user');
Route::post('/store_form_json', [\App\Http\Controllers\EmployeeController::class, 'storeJson']);

Route::get('/test_database', function () {
    $employee = new Employee;
    $employee->name = 'John';
    $employee->surname = 'Doe';
    $employee->email = 'john@doe.com';
    $employee->save();

    return view('WelcomeUser', ['name' => $employee['name'], 'surname' => $employee['surname'], 'email' => $employee['email']]);

    });

Route::put('/user/{id}', [EmployeeController::class, 'update']);
