<?php

namespace App\Http\Controllers;

use App\Department;
use Illuminate\Http\Request;

class DepartmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        //
        return Department::all()->toJson();
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
        $dep = new Department();
        $dep->dept_no = $request->post('dept_no');
        $dep->dept_name = $request->post('dept_name');
        $dep->save();
        return $dep;
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
        return Department::find($id)->toJson();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Department $department
     * @return string
     */
    public function update(Request $request, Department $department)
    {
        $validateData = $request->validate([
           'dept_no'=> 'string|max:4',
            'dept_name'=>'string|max:255',
        ]);
        $department->update($validateData);
        return $department->toJson();
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
        $dep= Department::find($id);
        $dep->delete();
        return $dep->toJson();
    }
}
