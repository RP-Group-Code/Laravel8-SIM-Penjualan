@extends('layout/index')
@section('content')

    <section class="content-header ml-3 mb-2">
        <title>Create | Penjualan Barang</title>
        <div class="container-fluid">
            <div class="container">
                <h1>
                    Penjualan Barang
                </h1>
                <ol class="breadcrumb mt-2">
                    <li class="active">" Barang - Suplier - Rincian Pembelian "</li>
                </ol>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    @if (session()->has('Eror'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('Eror') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismis="alert">
                            </button> --}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="container">
                <!-- jquery validation -->
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Penjualan Barang, Harap Perhatikan Pengetikan !!!</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('barang_keluars.store') }}" method="POST" enctype="multipart/form-data"
                        id="quickForm">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div>
                                            <label for="nama">Barang Gudang</label>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id" id="id" value="{{ old('id') }}">
                                            <input readonly type="text" id="nama_barang" class="form-control"
                                                placeholder="Cari nama barang" value="{{ old('nama_barang') }}">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                                    data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Stok</label>
                                        <input type="number" id="jumlah" class="form-control" id="exampleInputPassword1"
                                            placeholder="jumlah Barang" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="satuan">Jenis/Satuan Barang</label>
                                        <input type="text" name="satuan" id="satuan" class="form-control"
                                            id="exampleInputPassword1" placeholder="satuan Barang" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="Harga">Harga Barang</label>
                                        <input type="text" id="harga" class="form-control" id="exampleInputPassword1"
                                            placeholder="Harga Barang" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Penjualan</label>
                                        <input type="number" name="jumlah" id="jmlh" class="form-control"
                                            id="exampleInputPassword1" placeholder="Jumlah Barang Yang Sampai" required value="{{ old('jumlah') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Tanggal Penjualan</label>
                                        <input type="date" name="tanggal_keluar" id="jmlh" class="form-control"
                                            id="exampleInputPassword1" placeholder="Tanggal Barang Sampai" required value="{{ old('tanggal_keluar') }}">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga">Harga Jual Satuan</label>
                                        <input type="number" name="harga" id="hargajual" class="form-control"
                                            id="exampleInputPassword1" placeholder="Harga Awal Beli" required value="{{ old('harga') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="hidden" name="barang_id" id="barang_id1" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="tombol mt-5">
                                <a href="{{ route('barang_keluars.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary ml-3">TAMBAH</button>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- modal --}}
    <div class="modal fade" id="modal-item">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pilih Bahan Baku</h4>
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body table-responsive">
                    <table class="table table-bordered table-striped" id="tblBarangMasuk">
                        <thead>
                            <tr align="center">
                                <th>Id</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($barangs as $data)
                                <tr>
                                    <td align="center">{{ $data->id }}</td>
                                    <td>{{ $data->nama_barang }}</td>
                                    <td align="center">{{ $data->jumlah }}</td>
                                    <td align="center">{{ $data->jenis }}</td>
                                    <td align="center">{{ $data->harga }}</td>
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" id="select" data-dismiss="modal"
                                            data-id="{{ $data->id }}" data-nama_barang="{{ $data->nama_barang }}"
                                            data-stok="{{ $data->jumlah }}" data-satuan="{{ $data->jenis }}"
                                            data-harga="{{ $data->harga }}"><i class="fa fa-check"></i>Select
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @if (session('stok_kurang') == true)
    <script>
        alert("Stok tidak mencukupi")
    </script>
@endif --}}
@push('scripts')

    <script>
        $(function() {
            $('#tblBarangMasuk').DataTable()
        })
    </script>

    <script>
        $(document).ready(function() {
            $(document).on('click', '#select', function() {
                var id = $(this).data('id');
                var nama_barang = $(this).data('nama_barang');
                var stok = $(this).data('stok');
                var satuan = $(this).data('satuan');
                var harga = $(this).data('harga');
                $('#barang_id1').val(id);
                $('#nama_barang').val(nama_barang);
                $('#jumlah').val(stok);
                $('#satuan').val(satuan);
                $('#harga').val(harga);
                $('#hargajual').val(harga);
            })
        })
    </script>
@endpush
