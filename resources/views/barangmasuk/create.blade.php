@extends('layout/index')
@section('content')

    <section class="content-header ml-3 mb-2">
        <title>Create | Pembelian Bahan Baku Pembangunan</title>
        <div class="container-fluid">
            <div class="container">
                <h1>
                    Pembelian Bahan Baku Pembangunan
                </h1>
                <ol class="breadcrumb mt-2">
                    <li class="active">" Barang - Suplier - Rincian Pembelian "</li>
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
                        <h3 class="card-title">Pendataan Barang, Harap Perhatikan Pengetikan !!!</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="{{ route('barang_masuks.store') }}" method="POST" enctype="multipart/form-data"
                        id="quickForm">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <div>
                                            <label for="nama">Bahan Baku Stok <br> <small>(Pembelian Stok Bahan
                                                    Baku)</small></label>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id" id="id">
                                            <input readonly type="text" id="nama_barang" class="form-control"
                                                placeholder="Cari nama barang">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                                    data-target="#modal-item">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <div class="form-group">
                                        <div>
                                            <label for="nama">Bahan Baku Pengajuan <br> <small>(Pembelian
                                                    Pengajuan)</small></label>
                                        </div>
                                        <div class="form-group input-group">
                                            <input type="hidden" name="id2" id="id2">
                                            <input readonly type="text" id="nama_pengajuan" class="form-control"
                                                placeholder="Cari pengajuan">
                                            <span class="input-group-btn">
                                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal"
                                                    data-target="#modal-item2">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" name="jumlah" id="jumlah" class="form-control"
                                            id="exampleInputPassword1" placeholder="jumlah Barang" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jenis">Jenis</label>
                                        <input type="text" name="jenis" id="jenis" class="form-control"
                                            id="exampleInputPassword1" placeholder="jenis Barang" readonly>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" name="harga" id="harga" class="form-control"
                                            id="exampleInputPassword1" placeholder="harga Barang" readonly>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group mt-4">
                                <label for="suplier_id">Suplier</label>
                                <select name="suplier_id" id="suplier_id" class="form-control" required>
                                    @foreach ($supliers as $suplier)
                                        <option value="{{ $suplier->id }}">{{ $suplier->nama }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Pemesanan</label>
                                        <input type="number" name="jumlah" id="jmlh" class="form-control"
                                            id="exampleInputPassword1" placeholder="Jumlah Barang Yang Sampai" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="date">Tanggal Pemesanan</label>
                                        <input type="date" name="tanggal_masuk" id="jmlh" class="form-control"
                                            id="exampleInputPassword1" placeholder="Tanggal Barang Sampai" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" name="harga" class="form-control"
                                            id="exampleInputPassword1" placeholder="Harga Awal Beli" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="hidden" name="barang_id" id="barang_id1" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="tombol mt-5">
                                <a href="{{ route('barang_masuks.index') }}" class="btn btn-secondary">Back</a>
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
                                            data-harga="{{ $data->harga }}"><i
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
                var harga = $(this).data('harga');
                $('#barang_id1').val(id);
                $('#nama_barang').val(nama_barang);
                $('#jumlah').val(stok);
                $('#jenis').val(satuan);
                $('#harga').val(harga);
            })
        })
    </script>
@endpush
