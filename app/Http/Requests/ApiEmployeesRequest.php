<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApiEmployeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules=[
            'emp_no' => 'integer',
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'birth_date' => 'date',
            'hire_date' => 'date|after:birth_date',
            'gender' => 'string|max:1',
        ];
        if($this->isMethod('POST')){
            foreach ($rules as $rule){
                $rules[$rule] .='|required';
            }
            $rules["emp_no"]='integer|required|unique:employee';
        }
        return $rules;
    }
}
