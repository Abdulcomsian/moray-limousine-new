<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
        return [
              'lat_pck' => 'required|max:50',
            'long_pck' => 'required|max:50',
            'lat_drop' =>'required|max:50',
            'long_drop'=>'required|max:50',
            'pick_address'=>'required|max:150|string',
            'drop_address'=>'required|max:150|string',
            'total_distance'=>'required|max:150',
            'total_duration'=>'required|max:150',
            'pick_time'=>'required|max:150',
            'pick_date'=>'required|max:50',
            'booking_by'=>'required|max:20|string',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'lat_pck.required' => 'Please Select Proper PickUp Address From Dropdown !',
            'long_pck.required' => 'Please Select Proper Pick Up Address From Dropdown !',
            'lat_drop.required' => 'Please Select Proper Drop Address From Dropdown !',
            'long_drop.required' => 'Please Select Proper drop Address From Dropdown !'
        ];
    }

}
