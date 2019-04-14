<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TeachersRequest extends FormRequest
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
                    'surname' => 'required|max:150',
                    'id_no' => 'required|unique:teachers,id_no',
                    'dob' => 'required',
                    'address' => 'required',
                    'contactno' => 'required',
                    'email' => 'required|unique:users,email',
                    'gender' => 'required',
                    'active' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'surname' => 'required|max:150',
                    'id_no' => 'required|unique:teachers,id_no',
                    'dob' => 'required',
                    'address' => 'required',
                    'contactno' => 'required',
                    'gender' => 'required',
                    'active' => 'required'
			];
            }
            default:break;
        }
    }
}
