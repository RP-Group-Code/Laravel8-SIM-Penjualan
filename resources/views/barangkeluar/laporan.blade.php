@extends('layout/index')
@section('content')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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
    <section class="content-header">
        <div class="container">
            <title>Laporan</title>
            <center>
                <h1 class="textheader mt-5">
                    LAPORAN
                </h1>
                <H6 class="active">(Laporan Transaksi)</li>
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
            <div class="container">
                <form action="/laporangbarangkeluar" method="post">
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
                            <button type="submit"  class="btn btn-outline-secondary btn-sm mb-2 ml-2" name="search" title="search">
                                Cari
                            </button>
                            <a id="refresh" href="{{ route('laporan_barangkeluars.laporan') }}" class="btn btn-outline-warning btn-sm mb-2 ml-2">
                                Refresh
                            </a>
                        </div>
                    </div>
                </form>
                <!-- /.form group -->
                <!-- Date range -->
                {{-- <div class="form-group">
                    <label>Date range:</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text">
                          <i class="far fa-calendar-alt"></i>
                        </span>
                      </div>
                      <input type="text" class="form-control float-right" id="reservation">
                    </div>
                    <!-- /.input group -->
                </div> --}}
                <!-- /.form group -->
                {{-- <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="box-body mt-3">
                                    <table class="table table-striped table-hover" id="record">
                                        <thead>
                                            <tr align="center">
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                                <th>Tanggal Keluar</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 1;
                                            ?>
                                            @foreach ($laporan_barangkeluars as $barang_keluar)
                                                <tr>
                                                    <td align="center">{{ $no++ }}</td>
                                                    <td>{{ $barang_keluar->barang->nama_barang }}</td>
                                                    <td align="center">{{ $barang_keluar->jumlah }} </td>
                                                    <td align="center">{{ $barang_keluar->harga }} </td>
                                                    <td align="center">{{ $barang_keluar->total }} </td>
                                                    <td align="center">{{ $barang_keluar->tanggal_keluar }}</td>
                                                    <td>
                                                        <span style="font-size: 16px"
                                                            class="badge badge-success">Terjual</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                <!-- ./row -->
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="card card-primary card-tabs">
                            <div class="card-header p-0 pt-1">
                                <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill"
                                            href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home"
                                            aria-selected="true">Data Penjualan</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill"
                                            href="#custom-tabs-one-profile" role="tab"
                                            aria-controls="custom-tabs-one-profile" aria-selected="false">Data Pembelian</a>
                                    </li>
                                    {{-- <li class="nav-item">
                              <a class="nav-link" id="custom-tabs-one-messages-tab" data-toggle="pill" href="#custom-tabs-one-messages" role="tab" aria-controls="custom-tabs-one-messages" aria-selected="false">Messages</a>
                            </li>
                            <li class="nav-item">
                              <a class="nav-link" id="custom-tabs-one-settings-tab" data-toggle="pill" href="#custom-tabs-one-settings" role="tab" aria-controls="custom-tabs-one-settings" aria-selected="false">Settings</a>
                            </li> --}}
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-one-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-home-tab">
                                        <table class="table table-striped table-hover" id="dataTable">
                                            <thead>
                                                <tr align="center">
                                                    <th>No</th>
                                                    <th>Nama Barang</th>
                                                    <th>Jumlah</th>
                                                    <th>Harga</th>
                                                    <th>Total</th>
                                                    <th>Tanggal Keluar</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                ?>
                                                @foreach ($laporan_barangkeluars as $barang_keluar)
                                                    <tr>
                                                        <td align="center">{{ $no++ }}</td>
                                                        <td>{{ $barang_keluar->barang->nama_barang }}</td>
                                                        <td align="center">{{ $barang_keluar->jumlah }} </td>
                                                        <td align="center">{{ $barang_keluar->harga }} </td>
                                                        <td align="center">{{ $barang_keluar->total }} </td>
                                                        <td align="center">{{ $barang_keluar->tanggal_keluar }}</td>
                                                        <td>
                                                            <span style="font-size: 16px"
                                                                class="badge badge-success">Terjual</span>
                                                        </td>
                                                        {{-- @endif --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel"
                                        aria-labelledby="custom-tabs-one-profile-tab">
                                        <table class="table table-striped table-hover" id="dataTables">
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
                            <!-- /.card -->
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
        $(function() {
            $('#record').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');
        })
    </script>
    <script>
        $(document).on("click", "#filter", function(e) {
            e.preventDefault();

            var start_date = $("#start_date").val();
            var end_date = $("#end_date").val();

            if (start_date == "" || end_date == "") {
                alert("both date required");
            } else {
                $('#record').DataTable().destroy();
                fetch(start_date, end_date);
            }
            $(function() {
                $('#record').DataTable()
            })
        });
    </script>

    <script>
        $(document).on("click", "#reset", function(e) {
            e.preventDefault();

            $("#start_date").val(''); // empty value
            $("#end_date").val('');

            $('#record').DataTable().destroy();
            fetch();

            $(function() {
                $('#record').DataTable()
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
            $('#dataTables').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["excel", "print"]
            }).buttons().container().appendTo('#dataTables_wrapper .col-md-6:eq(0)');
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


    {{-- <script>
        function fetch(start_date, end_date) {
            $.ajax({
                url: "{{ route('laporangbarangkeluar.records') }}",
                type: "GEt",
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                dataType: "json",
                success: function(data) {
                    // Datatables
                    var i = 1;
                    $('#record').DataTable({
                        "data": data.laporangbarangkeluar,
                        // buttons
                        "dom": "<'row'<'col-sm-12 col-md-4'l><'col-sm-12 col-md-4'B><'col-sm-12 col-md-4'f>>" +
                            "<'row'<'col-sm-12'tr>>" +
                            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                        "buttons": [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ],
                        // responsive
                        "responsive": true,
                        "columns": [{
                                "data": "id",
                                "render": function(data, type, row, meta) {
                                    return i++;
                                }
                            },
                            {
                                "data": "name"
                            },
                            {
                                "data": "standard",
                                "render": function(data, type, row, meta) {
                                    return `${row.standard}th Standard`;
                                }
                            },
                            {
                                "data": "percentage",
                                "render": function(data, type, row, meta) {
                                    return `${row.percentage}%`;
                                }
                            },
                            {
                                "data": "result"
                            },
                            {
                                "data": "tanggal_keluar",
                                "render": function(data, type, row, meta) {
                                    return moment(row.tanggal_keluar).format('DD-MM-YYYY');
                                }
                            }
                        ]
                    });
                }
            });
        }
        $(function() {
            $('#record').DataTable()
        })
        fetch();
    </script> --}}

    {{-- <script>
        function load(){
            var table = $("#dataTable").DataTable{
                rowRecorder: true,
                columnDefs: [{
                    orderable: true,
                    calssName: 'reorder',
                    target: 0
                },
                {
                    ordeable: false,
                    targets: '_all'
                }
            ],
            responsive: true,
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{route()}}"
            }
            }
        }
    </script> --}}
@endpush
