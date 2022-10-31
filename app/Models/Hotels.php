<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotels extends Model
{
    protected $connection   = "mysql";
    protected $table        = "hotel";
    protected $primaryKey   = "id_hotel";
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        "id_hotel",
        "nama_hotel",
        "alamat_hotel",
        "gambar_hotel",
        "harga_hotel",
        "id_voucher",
        "status_hotel"
    ];

    public function Vouchers()
    {
        return $this->hasOne(Vouchers::class,"id_voucher","id_voucher");
    }
}
