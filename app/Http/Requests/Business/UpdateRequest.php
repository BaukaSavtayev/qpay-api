<?php

namespace App\Http\Requests\Business;

class UpdateRequest extends \Illuminate\Foundation\Http\FormRequest
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
            'name' => 'required|max:100|alpha_dash',
            'business_owner_name' => 'required|max:100|alpha',
            'description' => 'max:500',
        ];
    }
}
