<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FooddrugsRequest extends FormRequest
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
                    'drug_allergy' => '',
                    'food_allergy' => '',
                    'other_restriction' => '',
                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                   'drug_allergy' => '',
                    'food_allergy' => '',
                    'other_restriction' => '',	
                ];
            }
            default:break;
        }
    }
}
