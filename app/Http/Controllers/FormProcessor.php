<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormProcessor extends Controller
{
    public function index() {
        return view('FormProcessor');
    }

    public function store(Request $request) {
        $data = ['Name' => $request->nameform, 'Surname'=> $request->surnameform, 'Email' => $request->emailform];
        return view('WelcomeUser', ['name' => $data['Name'], 'surname' => $data['Surname'], 'email' => $data['Email']]);
    }
}
