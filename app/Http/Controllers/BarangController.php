<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Barangs['barangs'] = Barang::all();
        return view('barang.index',$Barangs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Barangs['barangs'] = Barang::all();
        return view('barang.create',$Barangs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Barang();
        $data->nama_barang = $request->nama_barang;
        $data->jenis = $request->jenis;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;

        $data->save();

        Alert::success('Penambahan Berhasil', "Data '$data->nama_barang' Berhasil Ditambah");
        return redirect()->route("barangs.index");
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
        $data['barangs'] = Barang::find($id);
        return view('barang.edit',$data);
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
        $data = Barang::find($id);

        $data->nama_barang = $request->nama_barang;
        $data->jenis = $request->jenis;
        $data->jumlah = $request->jumlah;
        $data->harga = $request->harga;
        $data->keterangan = $request->keterangan;

        $data->update();
        Alert::success('Penambahan Berhasil', "Data '$data->nama_barang' Berhasil Ditambah");
        return redirect()->route("barangs.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::destroy($id);
        return redirect()->route('barangs.index');
    }
}
