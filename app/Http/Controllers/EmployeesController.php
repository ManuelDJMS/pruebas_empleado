<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;
use App\Models\Positions;
use App\Models\Employees;
use DB;
class EmployeesController extends Controller
{
    public function employees(){

        return view('welcome');
    }

    public function prueba(){
        return view('welcome');
    }

    public function save_company(Request $request){
        $company=new Companies;
        $company->name=$request->get('name_company');
        $company->save();
        return response()->json(['success'=>"ok"]);
        
    }

    public function save_position(Request $request){
        $position=new Positions();
        $position->name=$request->get('name_position');
        $position->save();
        return response()->json(['success'=>"ok"]);    
    }

    public function save_employee(Request $request){
        $employee=new Employees;
        $employee->name=$request->get('name_employee');
        $employee->first_name=$request->get('first_name');
        $employee->last_name=$request->get('last_name');
        $employee->start_date=$request->get('start_date');
        $employee->position_id=$request->get('position');
        $employee->company_id=$request->get('company');
        $employee->save();
        return response()->json(['success'=>"ok"]);    
    }

    public function update_employee(Request $request){
        $employee=Employees::find($request->get('id'));
        $employee->name=$request->get('name_employee');
        $employee->first_name=$request->get('first_name');
        $employee->last_name=$request->get('last_name');
        $employee->start_date=$request->get('start_date');
        $employee->position_id=$request->get('position');
        $employee->company_id=$request->get('company');
        $employee->save();
        return response()->json(['success'=>"ok"]);    
    }

    public function get_employees() {
        $employees = DB::select(DB::Raw("SELECT employees.id, employees.name, employees.first_name, employees.last_name, start_date, positions.name as position, companies.name as company FROM employees inner join companies on employees.company_id = companies.id inner join positions on employees.position_id = positions.id"));
        return response()->json(['employees'=>$employees]);  
    }

    public function get_employee(Request $request) {
        $employee = Employees::find($request->get("id"));
        return response()->json(['employee'=>$employee]);  
    }

    public function delete_employee(Request $request) {
        $delete=Employees::find($request->get("id"));
        $delete->delete();
        return response()->json(['success'=>true]);
    }
}
