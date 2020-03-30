<?php

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

use App\Employees;

Route::get('/', function () {
    return \App\Employee::join('dept_emp','dept_emp.emp_no','employees.emp_no')
        ->join('departments','departments.dept_no','dept_emp.dept_no')
        ->where('dept_name','=','Sales')
        ->where('to_date','>','2000-01-01')
        ->where('from_date','<','2000-01-01')->get();
//    return\App\Employee::with('salary')->salaries();
//    return \App\Employee::join('salaries','employees.emp_no','salaries.emp_no')->where('salaries.salary',function ($q){$q->max('salary'));})->get();
//    return view('welcome');
//    return Employees::find(10001)->title()->get();
});

