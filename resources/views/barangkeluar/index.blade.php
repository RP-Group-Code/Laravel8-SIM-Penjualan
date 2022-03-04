@extends('layout/index')
@section('content')


    <div class="brg-konten">
        <section class="content-header ml-5">
            <title>View | Penjualan Barang</title>
            <div class="row mt-2 ml-2 mr-4">
                <div class="col-sm-6">
                    <h1 class="m-0">Penjualan Barang</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Penjualan Barang</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <ol class="breadcrumb mt-3 ml-3 mb-3">
                <li class="active">Pendataan Barang - Index - Show Data</li>
            </ol>
        </section>

        <section class="content ml-5 mr-5">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <div class="card">
                        <div class="card-header">
                            {{-- @if (session('user')[0]['jabatan'] == 'Manager Proyek' || session('user')[0]['jabatan'] == 'IT')
                                <a href="{{ route('barang_keluars.create') }}">
                                    <button class="btn btn-primary m-2  ">Tambah Barang</button>
                                </a>
                            @endif --}}
                            @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer')
                                <a href="{{ route('barang_keluars.create') }}">
                                    <button class="btn btn-primary m-2  ">Tambah Barang</button>
                                </a>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table_responsive">
                                <table class="table table-striped table-hover" id="tblkeluar">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>Tanggal Keluar</th>
                                            {{-- @if (session('user')[0]['jabatan'] == 'Manager Proyek' || session('user')[0]['jabatan'] == 'IT')
                                                <th>Aksi</th>
                                            @endif --}}
                                            <th>Aksi</th>

                                            <th>Status</th>
                                            {{-- @if (session('user')[0]['jabatan'] == 'Admin') --}}
                                            {{-- @endif --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        ?>
                                        @foreach ($barang_keluars as $barang_keluar)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td>{{ $barang_keluar->barang->nama_barang }}</td>
                                                <td align="center">{{ $barang_keluar->jumlah }} </td>
                                                <td align="center">{{ $barang_keluar->harga }} </td>
                                                <td align="center">{{ $barang_keluar->total }} </td>
                                                <td align="center">{{ $barang_keluar->tanggal_keluar }}</td>

                                                {{-- @if (session('user')[0]['jabatan'] == 'Admin') --}}
                                                <td>
                                                    <a href="{{ route('barang_keluars.edit', $barang_keluar->id) }}"
                                                        class="btn btn-warning">
                                                        <i class="fa fa-edit">Edit</i>
                                                    </a>
                                                    <a href="#" data-id="{{ $barang_keluar->id }}"
                                                        data-nama="{{ $barang_keluar->barang->nama_barang }}"
                                                        class="btn btn-danger tombol-hapus">
                                                        <i style="font-size: 11px" class="fa fa-trash"> Hapus</i>
                                                    </a>
                                                    {{-- <form method="POST" style="display: inline;"
                                                            action="{{ route('barang_keluars.destroy', $barang_keluar->id) }}"
                                                            id="delete{{ $barang_keluar->id }}"
                                                            data-id="{{ $barang_keluar->id }}" class="swall-hapus">
                                                            @method('delete')
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn">
                                                                <i class="fa fa-trash text-danger"></i>
                                                            </button>
                                                        </form> --}}
                                                </td>
                                                <td>
                                                    <span style="font-size: 16px" class="badge badge-success">Terjual</span>
                                                </td>
                                                {{-- @endif --}}
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
    </div>
    {{-- @include('Barang_keluar.create') --}}
@endsection

@push('scripts')

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
                    window.location = "/barang_barangkeluars/" + id + ""
                    Swal.fire(
                        'Terhapus!',
                        "" + nama + " Berhasil Dihapus.  ",
                        'success'
                    )
                }
            })
        })
    </script>

    <script>
        $(function() {
            $('#tblkeluar').DataTable()
        })
    </script>
@endpush
