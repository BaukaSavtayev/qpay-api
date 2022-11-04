<?php

namespace App\Http\Requests\Business\Contacts;

use App\Rules\PhoneNumberFormat;
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
            'phone_number' => new PhoneNumberFormat,
            'address' => 'min:4,max:100',
            'site_domain' => 'regex:/[a-z1-9]{1,50}\.[a-z1-9]{1,49}$/'
        ];
    }
}
