<?php

namespace App\Http\Requests\Business\Client;


class SearchClientRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'name_or_phone_number' => [
                'required',
                'regex:/^[\+1-90a-z]{3,20}$/'
            ],

        ];
    }
}
