<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TopUpRules implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if($value <= 0){
            return false;
        }
        if($value % 100000 != 0){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Top Up Saldo tidak boleh bernilai negatif dan atau berkelipatan Rp 100.000';
    }
}
