<?php

namespace App\Http\Requests\Business\Bonuses;

use App\Rules\ClientExist;
use App\Rules\PhoneNumberFormat;
use Illuminate\Foundation\Http\FormRequest;

class WithdrawalRequest extends FormRequest
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
            'bonus_amount' => [
                'required',
            ],
            'phone_number' => [
                'required',
                new PhoneNumberFormat,
                new ClientExist,
            ]
        ];
    }
}
