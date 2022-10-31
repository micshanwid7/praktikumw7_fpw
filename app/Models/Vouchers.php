<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vouchers extends Model
{
    use SoftDeletes;

    protected $connection   = "mysql";
    protected $table        = "voucher";
    protected $primaryKey   = "id_voucher";
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        "id_voucher",
        "kode_voucher",
        "potongan",
        "status_voucher"
    ];

    public function Hotels()
    {
        $this->hasMany(Hotels::class, "id_voucher", "id_voucher");
    }
}
