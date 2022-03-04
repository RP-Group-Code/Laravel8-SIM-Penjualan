@extends('layout/index')
@section('content')

    <section class="content-header ml-3 mb-2">
        <title>View | Pembelian Bahan Baku Pembangunan</title>

        <div class="container-fluid">
            <div class="container">
                <h1>
                    Update Data Bahan Baku Pembangunan
                </h1>
                <ol class="breadcrumb mt-2">
                    <li class="active">" Ubah Data Bahan Baku - Suplier - Rincian Pembelian "</li>
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
                        <h3 class="card-title">Perubahan Data Bahan Baku, Harap Perhatikan Pengetikan !!!</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('barang_masuks.update', $barang_masuk->id) }}" method="POST"
                        enctype="multipart/form-data" id="quickForm">
                        @method('put')
                        @csrf
                        <div class="card-body">
                            <div class="col">
                                <div class="form-group">
                                    <input type="hidden" value="{{ $barang_masuk['barang_id'] }}" name="barang_id" id="barang_id1" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div>
                                    <label for="nama">Bahan Baku Stok <br> <small>(Pembelian Stok Bahan
                                            Baku)</small></label>
                                </div>
                                <div class="form-group input-group">
                                    <input type="hidden" name="id" id="id">
                                    <input readonly type="text" id="nama_barang" class="form-control"
                                        placeholder="Cari nama barang" value="{{ $barang_masuk->barang->nama_barang }}">
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                            data-target="#modal-item">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" id="jumlah" class="form-control"
                                            id="exampleInputPassword1" value="{{ $barang_masuk->barang->jumlah }}" placeholder="jumlah Barang" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <input type="text" id="jenis" class="form-control"
                                            id="exampleInputPassword1" value="{{ $barang_masuk->barang->jenis }}"  placeholder="jenis Barang" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="suplier_id">Suplier</label>
                                <select name="suplier_id" id="suplier_id" class="form-control">
                                    <option value="{{ $barang_masuk['supplier_id'] }}" hidden>
                                        {{ $barang_masuk->supplier->nama }}
                                    </option>
                                    <option disabled> - Pilih Perubahan Suplier -</option>
                                    <option disabled> </option>
                                    @foreach ($supliers as $sp)
                                        @if ($barang_masuk['supplier_id'] == $sp->id)
                                            {
                                            <option disabled value="{{ $barang_masuk['supplier_id'] }}">
                                                {{ $barang_masuk->supplier->nama }} <- ( Already Selected )</option>
                                                    }
                                                @else
                                            <option value="{{ $sp->id }}"
                                                {{ $barang_masuk['supplier_id'] == $sp->id }}>
                                                {{ $sp->nama }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah">Jumlah Pesanan</label>
                                <input type="text" name="jumlah" class="form-control" id="exampleInputPassword1"
                                    placeholder="Jumlah Barang Yang Dibeli"
                                    value="{{ old('jumlah') ? old('jumlah') : $barang_masuk['jumlah'] }} ">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Modal</label>
                                <input type="text" name="harga" class="form-control" id="exampleInputPassword1"
                                    placeholder="Harga Awal Beli"
                                    value="{{ old('harga') ? old('harga') : $barang_masuk['harga'] }} ">
                            </div>
                            <div class="form-group">
                                <label for="form">Tanggal Penginputan Barang Masuk :</label>
                                <input type="date" name="tanggal_masuk" class="form-control" id="exampleInputPassword1"
                                    placeholder="Harga Awal Beli" value="{{ $barang_masuk['created_at'] }}" hidden>
                                {{ $barang_masuk->created_at }}
                            </div>
                            <div class="form-group">
                                <label for="form">Tanggal Barang Masuk :</label>
                                <input type="date" name="tanggal_masuk" class="form-control" id="exampleInputPassword1"
                                    placeholder="Harga Awal Beli" value="{{ $barang_masuk['tanggal_masuk'] }}">
                            </div>
                            <div class="form-group">
                                <input hidden type="text" name="status" class="form-control" id="exampleInputPassword1"
                                    placeholder="Harga Awal Beli"
                                    value="{{ old('status') ? old('status') : $barang_masuk['status'] }} ">
                            </div>
                            <div class="tombol mt-5">
                                <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">Back</a>
                                <button type="submit" class="btn btn-primary ml-3">UPDATE</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <td align="center">
                                        <button class="btn btn-xs btn-info" id="select" data-dismiss="modal"
                                            data-id="{{ $data->id }}" data-nama_barang="{{ $data->nama_barang }}"
                                            data-stok="{{ $data->jumlah }}" data-satuan="{{ $data->jenis }}"><i
                                                class="fa fa-check"></i>Select
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
                    $('#barang_id1').val(id);
                    $('#nama_barang').val(nama_barang);
                    $('#jumlah').val(stok);
                    $('#jenis').val(satuan);
                })
            })
        </script>
@endpush

