<?php

namespace App\Http\Requests\Business\Category;

use App\Rules\AllCatsExist;
use Illuminate\Foundation\Http\FormRequest;

class SetRequest extends FormRequest
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
            'categories' => ['required', 'string', new AllCatsExist]
        ];
    }
}
