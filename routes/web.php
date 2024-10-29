<?php

use Illuminate\Support\Facades\Route;
use App\Models\Employee;

Route::get('/', function () {
    return view('home', ['name' => 'John', 'age' => 25, 'position' => 'Senior Manager', 'address' => 'Doe Street 111']);
});

Route::get('/contacts', function () {
    return view('contacts', ['address' => 'Doe Street 111', 'post_code' => '111111', 'email' => 'john@doe.com', 'phone' => '111111']);
});

Route::get('/userform', [\App\Http\Controllers\FormProcessor::class, 'index']);
Route::post('/store_form', [\App\Http\Controllers\FormProcessor::class, 'store'])->name('store-user');

Route::get('/test_database', function () {
    $employee = new Employee;
    $employee->name = 'John';
    $employee->surname = 'Doe';
    $employee->email = 'john@doe.com';
    $employee->save();

    return view('WelcomeUser', ['name' => $employee['name'], 'surname' => $employee['surname'], 'email' => $employee['email']]);

    });
