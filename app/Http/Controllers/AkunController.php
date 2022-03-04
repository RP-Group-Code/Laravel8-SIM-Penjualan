<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class AkunController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Akuns['akuns'] = Akun::all();
        return view('akun.index',$Akuns);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Akuns['akuns'] = Akun::all();
        return view('akun.create',$Akuns);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Akun();
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->jabatan = $request->jabatan;
        $data->status = $request->status;

        $data->save();

        Alert::success('Penambahan Berhasil', "Data '$data->nama' Berhasil Ditambah");
        return redirect()->route("akuns.index");
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
        $data['akuns'] = Akun::find($id);
        return view('akun.edit', $data);
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

        $data = Akun::find($id);
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = $request->password;
        $data->jabatan = $request->jabatan;
        $data->status = $request->status;

        $data->update();
        Alert::success('Perubahan Berhasil', "Data '$data->nama' Berhasil Diubah");
        return redirect()->route("akuns.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Akun::destroy($id);
        return redirect()->route('akuns.index');
    }
}
