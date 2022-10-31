<?php

namespace App\Rules;

use App\Models\Users;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class PhoneSameRules implements Rule
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
        $check = Users::where('nomor_hp',$value)->get();
        if(count($check)>0){
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
        return 'Nomor Hp telah digunakan sebelumnya';
    }
}
