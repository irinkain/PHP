<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;


class EmployeeController extends Controller
{

    public function index()
    {
        $employees=Employee::all();
        return view('employees')->with('employees',$employees);
    }



    public function edit(Request $request,Employee $employee){
        return view("edit")->with("employee", $employee);
    }


    public function update(Request $request,Employee $employee){

        request()->validate([
            'Name'=>'required|min:5',
            'Surname'=>'required',
            'Phone'=>'required',
            'Position'=>'required',

        ]);

        $employee ->update($request-> all());
        return view("edit")->with("employee",$employee );
    }

}
