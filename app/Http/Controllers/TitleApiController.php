<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Title;
use Illuminate\Http\Request;

class TitleApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Title::whereDate('from_date', '<=', now())->whereDate('to_date', '>=', now())->paginate(10);
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
//        return $request;
//        $title = Employee::find($request->post('emp_no'))->titles()->where('to_date','=','9999-01-01')->update(['to_date' => date_format(now(), 'Y-m-d')]);
        $tilte = Employee::find($request->post('emp_no'))->titles()->where('to_date','>',now())->update()->update(['to_date' => date_format(now(), 'Y-m-d')]);
        $new = new Title();
        $new->emp_no = $request->post('emp_no');
        $new->title = $request->post('title');
        $new->from_date = date_format(now(), 'Y-m-d');
        $new->to_date = '9999-01-01';
        $new->save();
        return $new;
//        return $request->post('emp_no');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  Employee::find($id)->titles()->where('to_date','=','9999-01-01')->get();
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
        return response('forbiden', 405);
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
        return response('forbiden', 405);
    }
}
