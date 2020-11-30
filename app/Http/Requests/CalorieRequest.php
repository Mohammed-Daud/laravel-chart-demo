<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalorieRequest extends FormRequest
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
            'date' => 'required|date|unique:calorie_intakes,date',
            'breakfast' => 'required|digits_between:1,4',
            'lunch' => 'required|digits_between:1,4',
            'dinner' => 'required|digits_between:1,4',
        ];
    }

    public function messages()
    {
        return [
            'date.unique' => 'Data already submitted for this date'
        ];
    }
}
