@extends('layout.index')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <!-- Main content -->
    <section class="content-header ml-5">
        <title>View | Akun</title>
        <div class="row mt-2 ml-3 mr-4">
            <div class="col-sm-6">
                <h1 class="m-0">Data Akun</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Akun</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <ol class="breadcrumb mt-3 ml-3">
            <li class="active">" Data Akun - Main - Show Data Akun "</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="conten m-2">
                <div class="col-12">
                    <div class="card m-4">
                        <div class="card-header">
                            @if (session('user')[0]['jabatan'] == 'Developer')
                                <button type="button" class="btn btn-primary modal-dialog-centered mt-2"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Tambah Data Akun
                                </button>
                            @endif
                        </div>
                        <div class="card-body">
                            <div class="table_responsive">
                                <table id="tableSuplier" class="table table-striped table-hover">
                                    <thead>
                                        <tr align="center">
                                            <th>No</th>
                                            <th>NAMA AKUN</th>
                                            <th>USERNAME</th>
                                            <th>Password</th>
                                            <th>Jabatan</th>
                                            <th>Status User</th>
                                            @if (session('user')[0]['jabatan'] == 'Developer')
                                                <th>AKSI</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        ?>
                                        @foreach ($akuns as $spr)
                                            <tr>
                                                <td align="center">{{ $no++ }}</td>
                                                <td>
                                                    <div id="namasuplier" data-suplier="{{ $spr->nama }}"
                                                        class="nama">
                                                        {{ $spr->nama }}
                                                    </div>
                                                </td>
                                                <td>{{ $spr->username }}</td>
                                                <td>{{ $spr->password }}</td>
                                                <td align="center">{{ $spr->jabatan }}</td>
                                                <td align="center" style="font-size: 18px">
                                                    @if ($spr->status == 'Active')
                                                        <span class="badge badge-success">{{ $spr->status }}</span>
                                                    @elseif ($spr->status == 'Half Active')
                                                        <span class="badge badge-warning"
                                                            style="color: black">{{ $spr->status }}</span>
                                                    @else
                                                        <span class="badge badge-danger">{{ $spr->status }}</span>
                                                    @endif
                                                </td>
                                                @if (session('user')[0]['jabatan'] == 'Developer')
                                                    <td align="center">
                                                        <a href="{{ route('akuns.edit', $spr->id) }}"
                                                            class="btn btn-warning">
                                                            UPDATE
                                                        </a>
                                                        {{-- <form method="post" style="display:inline"
                                                            action="{{ route('akuns.destroy', $spr->id) }}">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn">
                                                                <i class="fa fa-trash text-danger">Hapus</i>
                                                            </button>
                                                        </form> --}}
                                                        <a href="#" data-id="{{ $spr->id }}"
                                                            data-nama="{{ $spr->nama }}"
                                                            class="btn btn-danger tombol-hapus">
                                                            <i style="font-size: 11px" class="fa fa-trash"> HAPUS</i>
                                                        </a>

                                                    </td>
                                                @endif
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
        @include('akun.create')
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
                    window.location = "/destroy_akuns/" + id + ""
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
            $('#tableSuplier').DataTable()
        })
    </script>
@endpush
