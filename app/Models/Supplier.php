<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $table = "tbsupplier";
    public $timestamps = false;
    protected $fileable =
    [
        'nama',
        'telephone',
        'alamat'
    ];

    protected $hidden;

}
