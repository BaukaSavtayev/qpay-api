<?php

namespace App\Http\Requests\Business\Schedules;

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
        $regex = '/^[01-2]{1}[01-9]{1}\:[01-5]{1}[01-9]{1}\-[01-2]{1}[01-9]{1}\:[01-5]{1}[01-9]{1}$/';
        return [
            'monday' => ["regex:$regex"],
            'tuesday' => ["regex:$regex"],
            'wednesday' => ["regex:$regex"],
            'thursday' => ["regex:$regex"],
            'friday' => ["regex:$regex"],
            'saturday' => ["regex:$regex"],
            'sunday' => ["regex:$regex"],
        ];
    }
}
