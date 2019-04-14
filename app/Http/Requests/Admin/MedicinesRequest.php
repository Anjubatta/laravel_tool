<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class MedicinesRequest extends FormRequest
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
                    'datetime' => 'required',
                    'title' => 'required',
                    'medicine' => 'required',
                    'dosage' => '',
                    'manner_of_oral' => '',
                    'administrated_by' => '',
                    'remarks' => '',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'datetime' => 'required',
                    'title' => 'required',
                    'medicine' => 'required',
                    'Dosage' => '',
                    'manner_of_oral' => '',
                    'administrated_by' => '',
                    'remarks' => '',
                ];
            }
            default:break;
        }
    }
}
