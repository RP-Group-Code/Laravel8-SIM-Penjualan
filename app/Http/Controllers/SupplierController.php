<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Supliers['supliers'] = Supplier::all();
        return view('supplier.index',$Supliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $create['supliers'] = new Supplier();
        return view('supplier.create', $create);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Supplier();
        $data->nama = $request->nama;
        $data->telephone = $request->telepon;
        $data->alamat = $request->alamat;
        $data->mail = $request->mail;

        $data->save();

        Alert::success('Penambahan Berhasil', "Data '$data->nama' Berhasil Ditambah");
        return redirect()->route("supliers.index");

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
        $data['supliers'] = Supplier::find($id);
        return view('supplier.edit', $data);
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
        $this->validate($request, [
            'nama' => 'required',
            'telepon' => 'required',
            'alamat' => 'required',
        ]);
        $suplier = Supplier::find($id);
        $suplier->nama = $request->nama;
        $suplier->telephone = $request->telepon;
        $suplier->alamat = $request->alamat;
        $suplier->mail = $request->mail;

        $suplier->update();
        Alert::success('Perubahan Berhasil', "Data '$suplier->nama' Berhasil Diubah");
        return redirect()->route("supliers.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::destroy($id);
        return redirect()->route('supliers.index');
    }
}
