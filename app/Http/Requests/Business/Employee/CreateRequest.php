<?php

namespace App\Http\Requests\Business\Employee;

use App\Rules\PhoneNumberFormat;
use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'name' => 'required|alpha_dash',
            'position' => 'required|alpha_dash',
            'phone_number' => [
                'required',
                'unique:users,phone_number',
                new PhoneNumberFormat
            ],
            'password' => [
                'required'
            ],
            'permissions' => 'required|array:top-up-account,accrual-bonuses,withdrawal-bonuses,profile-setup,add-employee,check-clients-list',
            'permissions.top-up-account' => 'required|boolean',
            'permissions.accrual-bonuses' => 'required|boolean',
            'permissions.withdrawal-bonuses' => 'required|boolean',
            'permissions.profile-setup' => 'required|boolean',
            'permissions.add-employee' => 'required|boolean',
            'permissions.check-clients-list' => 'required|boolean',
        ];
    }
}
