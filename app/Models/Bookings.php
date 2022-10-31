<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookings extends Model
{
    protected $connection   = "mysql";
    protected $table        = "booking";
    protected $primaryKey   = "id_booking";
    public $incrementing    = false;
    public $timestamps      = false;

    protected $fillable = [
        "id_booking",
        "id_hotel",
        "nomor_hp",
        "check_in",
        "check_out",
        "bayar",
        "status_booking"
    ];
}
