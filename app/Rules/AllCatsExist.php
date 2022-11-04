<?php

namespace App\Rules;

use App\Models\Category;
use Illuminate\Contracts\Validation\InvokableRule;

class AllCatsExist implements InvokableRule
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
        if ($value != 0) {
            $categories_ids = explode(',' , $value);
            $categories =  Category::whereIn('id', $categories_ids)->get();

            if (count($categories) != count($categories_ids))
                $fail('The entered categories do not exist.');
        }
    }
}
