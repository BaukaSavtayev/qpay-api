<?php

namespace App\Http\Requests\Business\Bonuses\Params;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'standard_bonus_size' => 'required|max_digits:3|min_digits:1',
            'activation_start' => 'required|numeric',
            'deactivation_start' => 'required|numeric',
        ];
    }
}
