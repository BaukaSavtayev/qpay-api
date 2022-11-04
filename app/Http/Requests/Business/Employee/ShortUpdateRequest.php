<?php

namespace App\Http\Requests\Business\Employee;

use App\Rules\PhoneNumberFormat;
use Illuminate\Foundation\Http\FormRequest;

class ShortUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|alpha_dash',
            'phone_number' => [
                'required',
                new PhoneNumberFormat
            ]
        ];
    }
}
