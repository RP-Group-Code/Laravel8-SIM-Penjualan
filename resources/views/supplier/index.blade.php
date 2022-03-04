@extends('layout.index')
@section('content')
    @if (Session::has('success'))
        <p class="alert alert-success">{{ Session::get('success') }}</p>
    @endif
    <!-- Main content -->
    <style>
        .textmer {
            color: red;
            font-size: 24px;
        }

        .textmer,
        marquee {
            width: 75%;
        }

        #blink {
            font-size: 20px;
            font-weight: bold;
            color: blue;
            transition: 0.2s;
        }

        #blinks {
            font-size: 40px;
            font-weight: bold;
            color: red;
            transition: 1s;
        }

    </style>
    <section class="content-header ml-5">
        <title>View | Suplier</title>
        <div class="row mt-2 ml-3 mr-4">
            <div class="col-sm-6">
                <h1 class="m-0">Data Suplier</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Suplier</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <ol class="breadcrumb mt-3 ml-3 mb-3">
            <li class="active">" Data Suplier - Main - Show Data Suplier "</li>
        </ol>
        <center>
            @if (session('user')[0]['status'] == 'Not Active')
                <p id="blink"> PERINGATAN !!!</p>
                <script type="text/javascript">
                    var blink = document.getElementById('blink');
                    setInterval(function() {
                        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
                    }, 2000);
                </script>
                <div class="textmer mb-5">
                    <marquee> Silahkan Lakukan Pengajuan Pada Developer Untuk Aktifasi Akun Menjadi Aktif !
                    </marquee>
                </div>
            @endif
        </center>
    </section>
    @if (session('user')[0]['status'] == 'Active')
        <section class="content m-2 ">
            <div class="row">
                <div class="conten m-2">
                    <div class="col-12">
                        <div class="card m-4">
                            <div class="card-header">
                                @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Developer')
                                    <button type="button" class="btn btn-primary modal-dialog-centered mt-2 mb-3"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        Tambah Data
                                    </button>
                                @endif
                            </div>
                            <div class="card-body">
                                <div class="table_responsive">
                                    <table id="tableSuplier" class="table table-striped table-hover">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>NAMA SUPLIER</th>
                                                <th>TELPHONE</th>
                                                <th>ALAMAT</th>
                                                <th>Email</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            ?>
                                            @foreach ($supliers as $spr)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td>
                                                        <div id="namasuplier" data-suplier="{{ $spr->nama }}"
                                                            class="nama">
                                                            {{ $spr->nama }}
                                                        </div>
                                                    </td>
                                                    <td>{{ $spr->telephone }}</td>
                                                    <td>{{ $spr->alamat }}</td>
                                                    <td align="center">{{ $spr->mail }}</td>
                                                    <td align="center">
                                                        <a href="{{ route('supliers.edit', $spr->id) }}"
                                                            class="btn btn-warning">
                                                            UPDATE
                                                        </a>
                                                        {{-- <form method="post" style="display:inline"
                                                            action="{{ route('supliers.destroy', $spr->id) }}">
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
            @include('supplier.create')
        </section>
    @endif
    @if (session('user')[0]['status'] == 'Not Active')
        <section align="center" class="content-fluid mt-5">
            <div class="contenT mt-5">
                <p class="mt-5" id="blinks"> STATUS AKUN ANDA SEBAGAI
                    <br>
                    {{ Session::get('user')[0]['nama'] }} TIDAK AKTIF
                </p>
                <script type="text/javascript">
                    var blinks = document.getElementById('blinks');
                    setInterval(function() {
                        blinks.style.opacity = (blinks.style.opacity == 0 ? 1 : 0);
                    }, 1300);
                </script>
            </div>
            <div class="contenT mt-5">
                <p class="mt-5">
                    Nama : {{ Session::get('user')[0]['nama'] }} <br>
                    Status : {{ Session::get('user')[0]['status'] }} <br>
                    Jabatan : {{ Session::get('user')[0]['jabatan'] }} <br>

                </p>
            </div>

        </section>
    @endif
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
                    window.location = "/destroy_supliers/" + id + ""
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
