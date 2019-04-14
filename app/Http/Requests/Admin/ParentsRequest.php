<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ParentsRequest extends FormRequest
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
        switch($this->method()){
          case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    
                    'sur_name' => 'required',
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'parent_id' => 'required|unique:parents,parent_id',
                    'contact_no' => 'required',
                    'gender' =>   'required',
                    'active' => 'required',
                    'address' => 'required',
                    'age' => 'required',
                    'email' => 'required|unique:parents,email'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                  
                    'sur_name' => 'required',
                    'first_name' => 'required',
                    'middle_name' => 'required',
                    'parent_id' => 'required|unique:parents,parent_id,'.$this->parent->id,
                    'contact_no' => 'required',
                    'gender' => 'required',
                    'active' => 'required',
                    'address' => 'required',
                    'age' => 'required',
                    'email' => 'required|unique:parents,email,'.$this->parent->id
                ];
            }
            default:break;

    }
    }
}
