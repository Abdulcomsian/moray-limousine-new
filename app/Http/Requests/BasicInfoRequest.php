<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BasicInfoRequest extends FormRequest
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
//            'on_behalf' => 'required|string|max:49',
//            'first_name' => 'required|string|max:49',
//            'last_name' => 'required|string|max:49',
//            'gender' => 'required|string|max:49',
//            'marital_status' => 'required|string|max:49',
//            'religion' => 'required|string|max:49',
//            'nationality' => 'required|string|max:49',
//            'cast' => 'required|string|max:49',
//            'self_description' => 'required|string|max:190',
//            'dob' => 'required|max:49',
        ];
    }
}
