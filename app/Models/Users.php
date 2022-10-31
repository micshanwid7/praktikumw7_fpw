<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Users extends Model
{

    protected $connection   = "mysql";
    protected $table        = "user";
    protected $primaryKey   = "id_user";
    public $incrementing    = true;
    public $timestamps      = false;

    protected $fillable = [
        "id_user",
        "nama_user",
        "nomor_hp",
        "saldo_user",
        "email",
        "password",
        "status_user",
      ];
}
