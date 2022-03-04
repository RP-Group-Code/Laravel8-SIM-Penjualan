@extends('layout.index')
@section('content')

    <section class="content-header">
        <div class="container">
            <div class="conten ml-5">
                <title>Edit | Suplier</title>
                {{-- <h1>
                    Suplier
                </h1> --}}
                <ol class="breadcrumb mt-5">
                    {{-- <li class=""><a href="{{ route('supliers.index') }}">Suplier</a></li> --}}
                    {{-- <li class="active">Edit</li> --}}
                </ol>
            </div>
        </div>
    </section>
    <div class="content">
        <div class="container">
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <div class="box-title mb-4">
                                    <h4>Edit Suplier</h4>
                                </div>
                            </div>
                            <form action="{{ route('supliers.update', $supliers->id) }}" method="POST">
                                <div class="box-body">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" name="nama" id="nama" class="form-control"
                                                    placeholder="Masukkan Nama"
                                                    value="{{ old('nama') ?: $supliers->nama }}">
                                                @error('nama')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="telepon">Telepon</label>
                                                <input type="text" name="telepon" id="telepon" class="form-control"
                                                    placeholder="Masukkan Telepon"
                                                    value="{{ old('telepon') ?: $supliers->telephone }}">
                                                @error('telepon')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" name="alamat" id="alamat" class="form-control"
                                                placeholder="Masukkan Alamat"
                                                value="{{ old('alamat') ?: $supliers->alamat }}">
                                            @error('alamat')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="exampleFormControlTextarea1" class="form-label">Email</label>
                                            <input name="mail" class="form-control" id="exampleFormControlTextarea1"
                                                value="{{ old('mail') ?: $supliers->mail }}">
                                            @error('mail')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="box-footer mt-3">
                                        <a href="{{ route('supliers.index') }}" class="btn btn-danger">
                                            Kembali
                                        </a>
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
