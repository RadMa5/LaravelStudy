<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Employee;

class PdfController extends Controller
{
    public function index($id){
        $data = Employee::where("id", $id)->first()->toArray();

        $pdf = Pdf::loadView('resume', $data);
        return $pdf->stream('resume.pdf');
    }
}
