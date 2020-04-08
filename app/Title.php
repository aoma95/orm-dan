<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    public $timestamps = false;
    protected $guarded = [];
    protected $primaryKey = "emp_no";
    public function employee() {
        return $this->belongsTo('App\Employee', 'emp_no', 'emp_no');
    }
}
//select emp_no from tilte groupeby emp_no having
