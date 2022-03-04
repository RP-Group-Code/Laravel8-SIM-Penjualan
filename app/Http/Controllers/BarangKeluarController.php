<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangKeluar;
use App\Models\BarangMasuk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Barang_keluars['barang_keluars'] = BarangKeluar::all();
        return view("barangkeluar.index", $Barang_keluars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Barang_keluars['barangs'] = Barang::all();
        $Barang_keluars['barang_keluars'] = BarangKeluar::all();
        return view("barangkeluar.create", $Barang_keluars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new BarangKeluar();
        $data->barang_id = $request->barang_id;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->total = $request->jumlah * $request->harga;
        $data->tanggal_keluar = $request->tanggal_keluar;

        $barang = Barang::find($request->barang_id);
        if ($request->jumlah >= $barang->jumlah) {
            return back()->with('Eror', "Stok Tidak Cukup, Barang $barang->nama_barang berjumlah $barang->jumlah, kurang dari $request->jumlah" );
            // return redirect("barang_keluars/create")->with('stok_kurang', true);
            alert('Stok tidak mencukupi');
        } else {
            $barang->jumlah = $barang->jumlah - $request->jumlah;
            $barang->save();
            Session::flash('addBarangMasuk', $data->save());
        }
        Alert::success('Penambahan Berhasil', "Data '$barang->nama_barang' Berhasil Ditambah");
        return redirect()->route("barang_keluars.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['barang_keluar'] = BarangKeluar::find($id);
        $data['barangs'] = Barang::all();

        return view("barangkeluar.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = BarangKeluar::find($id);
        $barang = Barang::find($data->barang_id);
        if ($request->jumlah >= $barang->jumlah)
        {
            return back()->with('Eror', "Stok Tidak Cukup, Barang $barang->nama_barang berjumlah $barang->jumlah, kurang dari $request->jumlah" );
        } else {
            $barang->jumlah = $barang->jumlah - ($request->jumlah - $data->jumlah);
            $barang->save();
            $data->barang_id = $request->barang_id;
            $data->jumlah = $request->jumlah;
            $data->harga = $request->harga;
            $data->total = $request->jumlah * $request->harga;
            $data->tanggal_keluar = $request->tanggal_keluar;
            $data->save();
        }
        Alert::success('Perubahan Berhasil', "Data '$barang->nama_barang' Berhasil Diubah");
        return redirect()->route("barang_keluars.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang_keluar = Barangkeluar::find($id);
        $barang = $barang_keluar->barang;
        $barang->jumlah += $barang_keluar->jumlah;
        $barang->save();
        $barang_keluar->delete();
        return redirect()->route('barang_keluars.index');
    }

    public function laporan(Request $request)
    {
        $LaporanBarangs['laporan_barangkeluars'] = BarangKeluar::all();
        $LaporanBarangs['laporan_masuks'] = BarangMasuk::all();
        return view("barangkeluar.laporan", $LaporanBarangs);
    }
    
    public function cari(Request $request)
    {
        $LaporanBarangs['laporan_barangkeluars'] = BarangKeluar::whereBetween('tanggal_keluar', [$request->start_date, $request->end_date])->get();
        $LaporanBarangs['laporan_masuks'] = BarangMasuk::whereBetween('tanggal_masuk', [$request->start_date, $request->end_date])->get();
        // dd($LaporanBarangs);
        return view("barangkeluar.laporan",$LaporanBarangs);
    }

    // public function search(Request $request)
    // {
    //     $start = $request->input('startdate');
    //     $end = $request->input('enddate');

    //     $query = DB::table('tbbarangkeluar')->select()
    //     ->where('tanggal_keluar', '>=', $start)
    //     ->where('tanggal_keluar', '<=', $end)
    //     ->get();

    //     $query['laporan_barangkeluars'] = BarangKeluar::all();
    //     // $search['search'] = BarangKeluar::all();
    //     // dd($query);
    //     return view("barangkeluar.laporan", $query);
    // }

    // public function records(Request $request)
    // {
    //     if ($request->ajax()) {

    //         if ($request->input('start_date') && $request->input('end_date')) {

    //             $start_date = Carbon::parse($request->input('start_date'));
    //             $end_date = Carbon::parse($request->input('end_date'));

    //             if ($end_date->greaterThan($start_date)) {
    //                 $laporangbarangkeluar = BarangKeluar::whereBetween('tanggal_keluar', [$start_date, $end_date])->get();
    //             } else {
    //                 $laporangbarangkeluar = BarangKeluar::latest()->get();
    //             }
    //         } else {
    //             $laporangbarangkeluar = BarangKeluar::latest()->get();
    //         }

    //         return response()->json([
    //             'laporangbarangkeluar' => $laporangbarangkeluar
    //         ]);
    //     } else {
    //         abort(403);
    //     }
    // }
}
