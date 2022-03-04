<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangMasuk;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Barang_masuks['barang_masuks'] = BarangMasuk::all();
        return view("barangmasuk.index", $Barang_masuks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['supliers'] = Supplier::all();
        $data['barangs'] = Barang::all();
        $data['barang_masuks'] = new BarangMasuk();
        return view('barangmasuk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = new BarangMasuk();
        $data->barang_id = $request->barang_id;
        $data->supplier_id = $request->suplier_id;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->tanggal_masuk = $request->tanggal_masuk;
        Session::flash('addBarangMasuk', $data->save());

        $barang = Barang::find($request->barang_id);
        $barang->jumlah = $barang->jumlah + $request->jumlah;
        $barang->save();

        Alert::success('Penambahan Berhasil', "Data '$barang->nama_barang' Berhasil Ditambah");
        return redirect()->route("barang_masuks.index");
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
        $data['barang_masuk'] = BarangMasuk::find($id);
        $data['barangs'] = Barang::all();
        $data['supliers'] = Supplier::all();
        return view('barangmasuk.edit',$data);
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
        $data = BarangMasuk::find($id);
        $barang = Barang::find($data->barang_id);
        $barang->jumlah = $barang->jumlah + ($request->jumlah - $data->jumlah);
        $barang->save();

        $data->barang_id = $request->barang_id;
        $data->supplier_id = $request->suplier_id;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->save();

        Alert::success('Perubahan Berhasil', "Data '$barang->nama_barang' Berhasil Diubah");
        return redirect()->route("barang_masuks.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang_masuk = BarangMasuk::find($id);
        $barang = $barang_masuk->barang;
        $barang->jumlah -= $barang_masuk->jumlah;
        $barang->save();
        $barang_masuk->delete();
        return redirect()->route('barang_masuks.index');
    }
    public function laporan(Request $request)
    {
        $LaporanBarangs['laporan_masuks'] = BarangMasuk::all();
        return view("barangmasuk.laporan", $LaporanBarangs);
    }
    public function cari(Request $request)
    {
        // $LaporanBarangs['laporan_masuks'] = BarangMasuk::where('tanggal_masuk','>=',$request->start_date)->where('tanggal_masuk','<=',$request->end_date)->latest()->get();
        $cari['laporan_masuks'] = BarangMasuk::whereBetween('tanggal_keluar', [$request->start_date, $request->end_date])->get();
        // dd($LaporanBarangs);
        return view("barangmasuk.laporan",$cari);
    }
}
