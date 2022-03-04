@extends('layout.index')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <!-- Main content -->
    <section class="content-header ml-5">
        <title>View | Bahan Baku Masuk</title>
        <div class="row mt-2 ml-2 mr-4">
            <div class="col-sm-6">
                <h1 class="m-0">Bahan Baku Masuk</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Bahan Baku Masuk</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <ol class="breadcrumb mt-3 ml-3 mb-3">
            <li class="active">Pembelian Bahan Baku - Index - Show Data</li>
        </ol>
    </section>
    <section class="content m-5">
        <div class="row">
            <div class="conten m-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            {{-- <button type="button" class="btn btn-success swalDefaultSuccess">
                                Launch Success Toast
                            </button>
                            <button type="button" class="btn btn-info swalDefaultInfo">
                                Launch Info Toast
                            </button> --}}
                            {{-- @if (session('user')[0]['jabatan'] == 'Manager Lapangan' || session('user')[0]['jabatan'] == 'IT')
                                <a href="{{ route('barang_masuks.create') }}">
                                    <button class="btn btn-primary m-2">Tambah Pembelian Stok</button>
                                </a>
                            @endif --}}
                            @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Developer')
                                <a href="{{ route('barang_masuks.create') }}">
                                    <button class="btn btn-primary m-2">Tambah Pembelian Stok</button>
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            <table id="barangmasuk" class="table table-striped table-hover">
                                <thead>
                                    <tr align="center">
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Suplier</th>
                                        <th>Jumlah Pesanan</th>
                                        <th>Total Harga Barang</th>
                                        <th>Tanggal Barang Masuk</th>
                                        {{-- @if (session('user')[0]['jabatan'] == 'Manager Lapangan' || session('user')[0]['jabatan'] == 'IT')
                                            <th>AKSI</th>
                                        @endif --}}
                                        <th>AKSI</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    ?>
                                    @foreach ($barang_masuks as $brg_masuk)
                                        <tr>
                                            <td align="center">{{ $no++ }}</td>
                                            <td align="left">{{ $brg_masuk->barang->nama_barang }}</td>
                                            <td>{{ $brg_masuk->supplier->nama }}</td>
                                            <td>{{ $brg_masuk->jumlah }}</td>
                                            <td align="center">Rp
                                                {{ number_format($brg_masuk->harga, 0, '.' . '.') }}
                                            </td>
                                            <td align="center">{{ $brg_masuk->tanggal_masuk }}</td>
                                            <td align="center">
                                                <a href="{{ route('barang_masuks.edit', $brg_masuk->id) }}"
                                                    class="btn btn-warning">
                                                    UPDATE
                                                </a>
                                                <a href="#" data-id="{{ $brg_masuk->id }}"
                                                    data-nama="{{ $brg_masuk->barang->nama_barang }}"
                                                    class="btn btn-danger tombol-hapus">Hapus
                                                </a>
                                            </td>
                                            {{-- @if (session('user')[0]['jabatan'] == 'Manager Lapangan' || session('user')[0]['jabatan'] == 'IT')
                                                    <td align="center">
                                                        <a href="{{ route('barang_masuks.edit', $brg_masuk->id) }}"
                                                            class="btn btn-warning">
                                                            UPDATE
                                                        </a>
                                                        <a href="#" data-id="{{ $brg_masuk->id }}" data-nama="{{ $brg_masuk->barang->nama_barang }}"
                                                            class="btn btn-danger tombol-hapus">Hapus
                                                        </a>
                                                    </td>
                                                @endif --}}
                                            <td align="center">
                                                <span style="font-size: 16px"
                                                    class="badge badge-info">{{ $brg_masuk->status }}</span>
                                            </td>
                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('#barangmasuk').DataTable()
        })
    </script>
    <script>
        $(".tombol-hapus").click(function() {
            var id = $(this).attr('data-id');
            var nama = $(this).attr('data-nama');

            Swal.fire({
                title: "Yakin ingin menghapus " + nama + " ?",
                text: "Anda tidak akan bisa mengembalikan data ini lagi !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#4CAF50',
                confirmButtonText: 'Ya, Hapus data !'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/destroy_barangmasuks/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        "" + nama + " Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>

@endpush
