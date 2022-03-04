<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index()
    {
        $data['supliers'] = Supplier::count();
        $data["persediaan"] = Barang::count();
        $data["barang"] = Barang::all();
        $data["user"] = Akun::count();
        $data["barang_masuk"] = BarangMasuk::all();
        $data["barang_keluar"] = BarangKeluar::all();
        $data["pemakaian"] = BarangKeluar::sum('harga');
        $data['pembelian'] = BarangMasuk::sum('harga');

        return view ('dashboard.index', $data);
    }
}
