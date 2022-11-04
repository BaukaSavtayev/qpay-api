<?php

namespace App\Http\Requests\Business\Account;

class TopUpAccountRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'amount' => 'required|numeric',
            'card_holder' => [
                'required',
                'regex:/^[a-z]{1,15} [a-z]{1,15}$/i',
            ],
            'pan' => 'required|digits:16',
            'exp_year_month' => [
                'required',
                'regex:/^\d{2}\/\d{2}$/i',
            ],
            'cvc' => 'required|digits:3',
        ];
    }
}
