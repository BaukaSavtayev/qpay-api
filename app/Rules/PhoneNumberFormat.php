<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class PhoneNumberFormat implements InvokableRule
{
    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        if (!preg_match('/^[01-9]{10,11}$/', $value))
            $fail('Номер телефона не соответствует формату');
    }
}
