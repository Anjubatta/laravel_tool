<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class feesRequest extends FormRequest
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
                    'for_month' => 'required',                   
                    'receipt_no' => 'required|unique:student_fees,receipt_no',                   
                    'date' => 'required',                   
                    'amount_received' => 'required',                   
                    'payment_mode' => 'required',                   
                    'net_amount' => 'required',                   
                    'student_id' => 'required',                   
                    'parent_id' => 'required',                   
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
               return [
                    'for_month' => 'required',                   
                    'receipt_no' => 'required|unique:student_fees,receipt_no',                    
                    'date' => 'required',                   
                    'amount_received' => 'required',                   
                    'payment_mode' => 'required',                   
                    'net_amount' => 'required',                 
                    'student_id' => 'required',                 
                    'parent_id' => 'required',                 
                ];
            }
            default:break;
        }
    }
}
