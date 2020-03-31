<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests\ApiEmployeesRequest;
class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Employee[]|\Illuminate\Database\Eloquent\Collection
     */
    public function index()
    {

//        return Employee::chunk(900,function ($employees){
//            return $employees;
//        });
        return Employee::paginate(10);
//        return $employees->chunk(100)->toJson();
//        return $employees;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->toArray();
        Employee::create($data);
        $employee = Employee::find($request->emp_no);
        return $employee;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
        return Employee::find($employee)->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $data = $request->validate([
            last_nam
        ]);
        $employee->update($data);
        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return string
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
        return $employee;
    }
}
