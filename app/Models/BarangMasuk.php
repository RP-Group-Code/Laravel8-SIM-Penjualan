<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;
    protected $table = "tbbarangmasuk";

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

}
