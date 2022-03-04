@extends('layout/index')
@section('content')
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <section class="content-header">
        <div class="container">
            <title>Laporan Pembelian</title>
            <center>
                <h1 class="textheader mt-5">
                    Laporan Pembelian
                </h1>
                <H6 class="active">(Barang Masuk)</li>
            </center>
        </div>
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
        <section class="content">
            <form action="{{ route('laporan_barangmasuks.cari') }}" method="POST" >
                @csrf
                <div class="d-flex justify-content-center">
                    <div class="form-inline">
                        <div class="form-group mb-2">
                            <label for="start_date" class="col-sm-2 col-form-label"> Start</label>
                            <input for="start_date" placeholder="Start date" class="form-control" autocomplete="off"
                                data-language='en' data-date-format="yyyy-mm-dd" name="start_date" id="start_date"
                                class="form-control" />
                        </div>
                        <div class="form-group mb-2">
                            <label for="end_date" class="col-sm-2 col-form-label"> End</label>
                            <input for="end_date" placeholder="End date" class="form-control" autocomplete="off"
                                data-language='en' data-date-format="yyyy-mm-dd" name="end_date" id="end_date"
                                class="form-control" />
                        </div>
                        <button id="filter" type="submit" class="btn" name="search" title="search">
                            <i class="fas fa-search"></i>
                        </button>
                        <button id="reset" class="btn btn-outline-warning btn-sm">Reset</button>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="box-body mt-3">
                                    <table class="table table-striped table-hover" id="dataTable">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Suplier</th>
                                                <th>Jumlah Pesanan</th>
                                                <th>Total Harga Barang</th>
                                                <th>Tanggal Barang Masuk</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            ?>
                                            @foreach ($laporan_masuks as $brg_masuk)
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
            </div>
            {{-- @include('Barang_keluar.create') --}}
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

@push('scripts')
    <script>
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();

            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (start_date == "" || end_date == "") {
                alert("both date required");
            } else {
                $('#dataTable').DataTable().destroy();
                fetch(start_date, end_date);
            }
            $(function() {
                $('#dataTable').DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "print"]
                }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
            })
        });
    </script>
    <script>
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();

            $("#start_date").val(''); // empty value
            $("#end_date").val('');

            $('#dataTable').DataTable().destroy();
            fetch();

            // $(function() {
            //     $('#dataTable').DataTable()
            // })
            $(function() {
                $('#dataTable').DataTable({
                    "responsive": true,
                    "lengthChange": false,
                    "autoWidth": false,
                    "buttons": ["excel", "print"]
                }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
            })
        });
    </script>
    <script>
        $(function() {
            $('#dataTable').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        })
    </script>
    <script>
        $(function() {
            $("#start_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
            $("#end_date").datepicker({
                "dateFormat": "yy-mm-dd"
            });
        });
    </script>
@endpush
