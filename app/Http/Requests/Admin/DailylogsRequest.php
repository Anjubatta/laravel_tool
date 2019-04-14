<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DailylogsRequest extends FormRequest
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
                    
                    'date' => 'required',                    
                    'opened_by' => 'required',                    
                    'timein' => 'required',                    
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                   
                    'date' => 'required',                    
                    'opened_by' => 'required',                    
                    'timein' => 'required',         
                ];
            }
            default:break;
        }
    }
}
