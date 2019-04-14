<?php

namespace App\Http\Requests\Superadmin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                    'name' => 'required|max:150',
                    'id_no' => 'required|unique:companies,id_no',
                    'email' => 'required|unique:users,email|max:100',
                    'information' => 'required',
                    'address' => 'required',
                    'active' => 'required'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|max:150',
                    'id_no' => 'required|unique:companies,id_no,'.$this->company->id,
                    'information' => 'required',
                    'address' => 'required',
                    'active' => 'required'
                ];
            }
            default:break;
        }
    }
}
