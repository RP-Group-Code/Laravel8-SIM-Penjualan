@extends('layout/index')
@section('content')
    <section class="content-header ml-3 mb-2">
        <title>Edit | Akun</title>

        <div class="container-fluid">
            <div class="container">
                <h1>
                    Update Data User
                </h1>
                <ol class="breadcrumb mt-2">
                    <li class="active">" Data User - Edit - Change Data"</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="container">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Perubahan Data Akun, Harap Perhatikan Pengetikan !!!</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('akuns.update', $akuns->id) }}" method="POST" enctype="multipart/form-data"
                        id="quickForm">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="nama">Nama Akun</label>
                                        <input type="text" name="nama" class="form-control"
                                            placeholder="Nama Barang / Merk Barang"
                                            value="{{ old('nama') ? old('nama') : $akuns['nama'] }}">
                                        @error('nama')
                                            <small style="color: red">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status" class="col-form-label">status Bahan Baku</label>
                                        <div class="col-sm-3 form-group">
                                            <select class="form-control" name="status" id="status">
                                                <option value="{{ $akuns->status }}" hidden>
                                                    {{ $akuns->status }}
                                                </option>
                                                <option>~ Pilih Status User ~</option>
                                                <option value="Active">Active</option>
                                                <option value="Half Active">Half Active</option>
                                                <option value="Not Active">Not Active</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" id="exampleInputPassword1"
                                            placeholder="username Bahan Baku"
                                            value="{{ old('username') ? old('username') : $akuns['username'] }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input class="form-control" name="password" id="exampleFormControlTextarea1"
                                            rows="3" value="{{ old('password') ? old('password') : $akuns['password'] }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <input class="form-control" name="jabatan" id="exampleFormControlTextarea1"
                                            rows="3" value="{{ old('jabatan') ? old('jabatan') : $akuns['jabatan'] }}">
                                    </div>
                                </div>
                            </div>
                            <div class="tombol">
                                <a href="{{ route('akuns.index') }}" class="btn btn-danger mt-5">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary ml-3 mt-5">UPDATE</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
