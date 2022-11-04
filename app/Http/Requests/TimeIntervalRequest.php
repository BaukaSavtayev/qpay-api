<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TimeIntervalRequest extends FormRequest
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
            'time_interval.start' => [
                'required',
                'date'
            ],
            'time_interval.end' => [
                'required',
                'date',
                'after_or_equal:time_interval.start'
            ]
        ];
    }
}
