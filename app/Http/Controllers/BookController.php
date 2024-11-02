<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index(){
        return view('FormProcessor');
    }

    public function store(Request $request){
        try {
            $request->validate([
                'nameform' => ['required', 'max:100', 'unique:books,Name'], 'authorform' => ['required', 'max:255'], 'genreform' => ['required']
            ]);
        } catch(ValidationException $e){
            die($e->getMessage());
        }

        $book = new Book;
        $book->Name = $request->input('nameform');
        $book->Author = $request->input('authorform');
        $book->Genre = $request->input('genreform');
        $book->save();
    }
}
