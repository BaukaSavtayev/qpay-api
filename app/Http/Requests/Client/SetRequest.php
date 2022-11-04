<?php

namespace App\Http\Requests\Client;

use App\Rules\PhoneNumberFormat;
use Illuminate\Validation\Rule;

class SetRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'name' => [
                'required',
                'alpha_dash'
            ],
            'phone_number' => [
                'required',
                Rule::unique('users', 'phone_number')->ignore($this->client->user->id),
                new PhoneNumberFormat
            ],
            'password' => [
                'password' => 'max:20',
            ]

        ];
    }
}
