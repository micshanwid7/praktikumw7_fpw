<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Cookie;
use PhpParser\Node\Stmt\Foreach_;

class CaptchaRules implements Rule
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
        $captcha = Cookie::get('captcha');
        if ($captcha == null) {
            $captcha = [];
        }else{
            $captcha = json_decode($captcha,true);

        }
        $value2 = $captcha;

        if(strrev($value2) != $value){
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
        return 'Captcha tidak sesuai, harus palindrom dan perhatikan huruf besar dan kecilnya';
    }
}
