<?php

namespace App\Rules;


use App\Models\Client;
use App\Models\User;
use Illuminate\Contracts\Validation\InvokableRule;

class ClientExist implements InvokableRule
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
        $client =  User::where('phone_number', $value)->where('userable_type', Client::class)->first();
        if (!$client)
            $fail('Клиент не найден!');
    }
}
