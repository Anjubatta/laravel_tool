<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class IncidentsRequest extends FormRequest
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
                    'staff_present' => '',
                    'location' => '',
                    'equipment' => '',
                    'part_of_body' => 'required',
                    'description' => '',
                    'how_occur' => '',
                    'treatment_details' =>   '',
                    'corrective_action' => '',
                    'name_of_notify' => '',
                    'time_notify' => '',
                    'notify_by' => '',
                    'type_of_incident' => '',
                    'treatment_by_dr' => '',
                    'way_of_notify' => '',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                     'staff_present' => '',
                    'location' => '',
                    'equipment' => '',
                    'part_of_body' => 'required',
                    'description' => '',
                    'how_occur' => '',
                    'treatment_details' =>   '',
                    'corrective_action' => '',
                    'name_of_notify' => '',
                    'time_notify' => '',
                    'notify_by' => '',
                    'type_of_incident' => '',
                    'treatment_by_dr' => '',
                    'way_of_notify' => '',
                ];
            }
            default:break;
        }
    }
}
