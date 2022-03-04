<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\mysqli;

class BarangKeluar extends Model
{
    use HasFactory;
    protected $table = "tbbarangkeluar";

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

}
