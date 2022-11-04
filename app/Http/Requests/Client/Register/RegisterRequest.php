<?php

namespace App\Http\Requests\Client\Register;

use App\Rules\PhoneNumberFormat;

class RegisterRequest extends \Illuminate\Foundation\Http\FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'alpha_dash'
            ],
            'phone_number' => [
                'required',
                'unique:users,phone_number',
                new PhoneNumberFormat
            ],
            'password' => [
                'password' => 'max:20',
            ]

        ];
    }
}
