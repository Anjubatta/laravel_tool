<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StudentsRequest extends FormRequest
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
        switch($this->method())
        {
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'image' => '',
                    'surname' => 'required',
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'student_no' => 'required|unique:students,student_no',
                    'contact_no' => 'required|max:15',
                    'gender' =>   'required',
                    'active' => 'required',
                    'address' => 'required',
                    'dob' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'image' => '',
                    'surname' => 'required',
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'student_no' => 'required|unique:students,student_no,'.$this->student->id,
                    'contact_no' => 'required',
                    'gender' => 'required',
                    'active' => 'required',
                    'address' => 'required',
                    'dob' => 'required'
                ];
            }
            default:break;
        }
    }
}
