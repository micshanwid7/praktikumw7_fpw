<?php

namespace App\Rules;

use App\Models\Hotels;
use App\Models\Vouchers;
use Illuminate\Contracts\Validation\Rule;

class KodeSameRules implements Rule
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
        $check = Vouchers::where("kode_voucher",$value)->get();
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
        return 'Kode telah digunakan sebelumnya';
    }
}
