<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function userform() {
        return view('FormProcessor');
    }

    public function store(Request $request){

        $employee = new Employee;
        $employee->Name = $request->input('nameform');
        $employee->Surname = $request->input('surnameform');
        $employee->Email = $request->input('emailform');
        $employee->Position = $request->input('positionform');
        $employee->save();
    }

    public function storeJson(Request $request){
        $text = $request->textarea;
        // dump($text);
        $decodedData = json_decode($text);
        // var_dump($decodedData);

        foreach($decodedData as $em){
            $employee = new Employee;
            $employee->Name = $em->Name;
            $employee->Surname = $em->Surname;
            $employee->Email = $em->Email;
            $employee->Position = $em->Position;
            $employee->save();
        }

    }


    public function update(Request $request, $id) {
        $empl = Employee::where('id', $this->$id)->first();
        $empl->Name = $request->name;
        $empl->Surname = $request->surname;
        $empl->Email = $request->email;
        $empl->Position= $request->position;
        $empl->save();
    }

    public function getPath(Request $request){
        $uri = $request->path();
    }
    public function getUrl(Request $request){
        $url = $request->url();
    }

    public function get($id){
        $emp = Employee::where("id", $id)->first()->toArray();
        return view('oneuser', $emp);
    }

    public function index(){
        $emp = Employee::all(['*'])->toArray();
        return view('allusers', ["emps" => $emp]);
    }
}
