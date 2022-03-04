<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $table = "tbbarangkeluar";
    public $timestamps = false;

    // public function barang()
    // {
    //     return $this->belongsTo(Barang::class);
    // }
}
