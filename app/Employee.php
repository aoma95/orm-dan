<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public $timestamps = false;
    protected $primaryKey = "emp_no";
    protected $fillable = [
        'emp_no',
        'birth_date',
        'first_name',
        'last_name',
        'gender',
        'hire_date'
    ];
    public function departments() {
        return $this->belongsToMany('App\Department', 'dept_emp', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }
    public function managedDepartments() {
        return $this->belongsToMany('App\Department', 'dept_manager', 'emp_no', 'dept_no')->withPivot('from_date', 'to_date');
    }
    public function salaries() {
        return $this->hasMany('App\Salary', 'emp_no');
    }
    public function titles() {
        return $this->hasMany('App\Title', 'emp_no');
    }

}
