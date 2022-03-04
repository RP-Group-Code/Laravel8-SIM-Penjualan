@extends('layout/index')
@section('content')

    <div class="content">
        <div class="container">
            <section class="content-header ml-5">
                <title>View | Barang</title>
                <div class="row mt-2 mr-4">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Barang</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Barang</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <ol class="breadcrumb mt-3 mb-3">
                    <li class="active">" Data Barang - Main - Show Data Barang "</li>
                </ol>
            </section>
            <section class="content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <div class="box-title mb-5">
                                    <h4>Edit Data Barang</h4>
                                </div>
                            </div>
                            <form action="{{ route('barangs.update', $barangs->id) }}" method="POST">
                                <div class="box-body">
                                    @method('put')
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="nama_barang">Nama Barang</label>
                                                <input type="text" name="nama_barang" id="nama" class="form-control"
                                                    value="{{ old('nama_barang') ?: $barangs->nama_barang }}">
                                                @error('nama_barang')
                                                    <small style="color: red">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="jenis" class="col-form-label">jenis Bahan
                                                    Baku</label>
                                                <div class="row ">
                                                    <div class="col-sm-2 form-group">
                                                        <select class="form-control" name="jenis" id="jenis">
                                                            <option value="{{ $barangs->jenis }}" hidden>
                                                                {{ $barangs->jenis }}
                                                            </option>
                                                            <option>~ Pilih jenis ~</option>
                                                            <option value="Pcs">Pcs</option>
                                                            <option value="Lusin">Lusin</option>
                                                            <option value="Pack">Pack</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="jumlah">jumlah</label>
                                            <input type="text" name="jumlah" id="jumlah" class="form-control"
                                                placeholder="Masukkan jumlah"
                                                value="{{ old('jumlah') ?: $barangs->jumlah }}">
                                            @error('jumlah')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="harga">harga</label>
                                            <input type="text" name="harga" id="harga" class="form-control"
                                                placeholder="Masukkan harga"
                                                value="{{ old('harga') ?: $barangs->harga }}">
                                            @error('harga')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group mt-4">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Keterangan</label>
                                            <input name="keterangan" class="form-control" id="exampleFormControlTextarea1"
                                                value="{{ old('keterangan') ?: $barangs->keterangan }}">
                                            @error('keterangan')
                                                <small style="color: red">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="box-footer mt-3">
                                        <a href="{{ route('barangs.index') }}" class="btn btn-danger">
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
