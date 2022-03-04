@extends('layout.index')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <!-- Main content -->
    <section class="content-header ml-5">
        <title>View | Barang</title>
        <div class="row mt-2 ml-3 mr-4">
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
        <ol class="breadcrumb mt-3 ml-3 mb-3">
            <li class="active">" Data Barang - Main - Show Data Barang "</li>
        </ol>
    </section>
    <section class="content mr-4 ml-4 ">
        <div class="row">
            <div class="conten">
                <div class="col-12">
                    <div class="card m-4">
                        <div class="card-header">
                            <button type="button" class="btn btn-primary modal-dialog-centered mt-2 mb-3"
                                data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Data Barang
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table_responsive">
                                <table id="tablebarang" class="table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>NAMA BARANG</th>
                                            <th>JENIS</th>
                                            <th>JUMLAH</th>
                                            <th>HARGA</th>
                                            <th>KETERANGAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        ?>
                                        @foreach ($barangs as $spr)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td>
                                                    <div id="namasuplier" data-suplier="{{ $spr->nama_barang }}"
                                                        class="nama">
                                                        {{ $spr->nama_barang }}
                                                    </div>
                                                </td>
                                                <td>{{ $spr->jenis }}</td>
                                                <td>{{ $spr->jumlah }}</td>
                                                <td align="center">
                                                    <b>
                                                        Rp {{ number_format($spr->harga, 0, '.' . '.') }}
                                                    </b>
                                                    {{-- per {{ $spr->jenis}} --}}
                                                </td>
                                                <td align="center">{{ $spr->keterangan }}</td>
                                                <td align="center">
                                                    <a href="{{ route('barangs.edit', $spr->id) }}"
                                                        class="btn btn-warning">
                                                        UPDATE
                                                    </a>
                                                    {{-- <form method="post" style="display:inline"
                                                        action="{{ route('barangs.destroy', $spr->id) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="submit" class="btn">
                                                            <i class="fa fa-trash text-danger">Hapus</i>
                                                        </button>
                                                    </form> --}}
                                                    <a href="#" data-id="{{ $spr->id }}"
                                                        data-nama="{{ $spr->nama_barang }}"
                                                        class="btn btn-danger tombol-hapus">HAPUS</i>
                                                    </a>

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
        </div>
        @include('barang.create')
    </section>

@endsection
{{-- manggil --}}
{{-- dorong kedalam script 'bebas' --}}
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
                    window.location = "/destroy_barangs/" + id + ""
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
            $('#tablebarang').DataTable()
        })
    </script>
@endpush
