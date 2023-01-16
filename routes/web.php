<?php

use Illuminate\Support\Facades\Route;
use App\Models\Companies;
use App\Models\Positions;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\EmployeesController;
 
Route::get('/', function () {
    $companies=Companies::all();
    $positions=Positions::all();
    return view('welcome', array('companies'=>$companies, 'positions'=>$positions));
});

Route::get('/save_company', [EmployeesController::class, 'save_company']);
Route::get('/save_position', [EmployeesController::class, 'save_position']);
Route::get('/save_employee', [EmployeesController::class, 'save_employee']);
Route::get('/update_employee', [EmployeesController::class, 'update_employee']);
Route::get('/get_employees', [EmployeesController::class, 'get_employees']);
Route::get('/get_employee', [EmployeesController::class, 'get_employee']);
Route::get('/delete_employee', [EmployeesController::class, 'delete_employee']);