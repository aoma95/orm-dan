<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Salary;
use Illuminate\Http\Request;

class SalaryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Salary::paginate(10);
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
        Employee::find($request->post('emp_no'))->salaries()->where('to_date','=','9999-01-01')->update(['to_date' => date_format(now(), 'Y-m-d')]);
        $new = new Salary();
        $new->emp_no = $request->post('emp_no');
        $new->salary = $request->post('salary');
        $new->from_date = date_format(now(), 'Y-m-d');
        $new->to_date = '9999-01-01';
        $new->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Employee::find($id)->salaries()->where('to_date','=','9999-01-01')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return response('forbiden', 503);
    }
}
