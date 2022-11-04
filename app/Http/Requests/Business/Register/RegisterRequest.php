<?php

namespace App\Http\Requests\Business\Register;

use App\Rules\PhoneNumberFormat;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|alpha_dash|max:500',
            'business_owner_name' => 'required|alpha_dash|max:500',
            'password' => 'required|max:20',
            'phone_number' => [
                'required',
                'unique:users,phone_number',
                new PhoneNumberFormat
            ],
        ];
    }
}
