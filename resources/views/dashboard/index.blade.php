@extends('layout.index')
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

    <section class="content-header">
        <div class="container-fluid">
            <div class="row ml-3 mr-4">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                    <title>SIM | Dashboard</title>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
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
            </div>
        </div>
    </section>
    @if (session('user')[0]['status'] == 'Active' || session('user')[0]['status'] == 'Half Active')
        <section class="content-fluid">
            <div class="container mt-5">
                <div class="row mr-5 ml-5">
                    @if (session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Manager' || session('user')[0]['jabatan'] == 'Karyawan')
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3 class="mb-5">{{ $supliers }}</h3>
                                    <h3 style="font-size: 22px">Supliers</h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-address-book mr-2"></i>
                                </div>
                                <a href="{{ url('supliers') }}" class="small-box-footer">Detail<i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif
                    @if (session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Manager')
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3 class="mb-5">{{ $user }}</h3>
                                    <h3 style="font-size: 22px">Pengguna</h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ url('users') }}" class="small-box-footer">Detail<i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif

                    @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Manager')
                        <div class="col-lg-3 col-6 mb-5">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 class="mb-5">Rp
                                        {{ number_format($pemakaian, 0, ',', '.') }}</h3>
                                    <h3 style="font-size: 18px">
                                        Penjualan
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-upload"></i>
                                </div>
                                <a href="{{ url('barang_keluars') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    @endif

                    @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Developer')
                        <div class="col-lg-3 col-6 mb-5">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3 class="mb-5" style="font-size: 18px"> Rp
                                        {{ number_format($pembelian, 0, ',', '.') }}</h3>
                                    <h3 class="mt-2" style="font-size: 18px">
                                        Pembelian
                                    </h3>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-money-check-alt mt-1"></i>
                                </div>
                                <a href="{{ url('barang_masuks') }}" class="small-box-footer">More info <i
                                        class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
            <div class="row mr-5 ml-5">
                <section class="col connectedSortable mb-1">
                    <div class="card card-danger">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-sm-10">
                                    <h3 class="card-title">Bagan Bahan Baku</h3>
                                </div>
                                <div class="col-sm-1">
                                    <div class="form-group row">
                                        <form>
                                            <div class="row">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-sm-1">
                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i
                                                class="fas fa-times"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="donutChart"
                                style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </section>
            </div>
        </section>
    @endif
    @if (session('user')[0]['status'] == 'Not Active')
        <section align="center" class="content-fluid mt-5">
            <div class="contenT mt-5">
                <p class="mt-5" id="blinks"> STATUS AKUN ANDA SEBAGAI
                    <br>
                    {{ Session::get('user')[0]['nama'] }} TIDAK AKTIF </p>
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
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- <script>
        //-------------
        //- PIE CHART -
        //-------------
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#donutChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                @foreach ($barang as $ps)
                    @if ($ps->jenis == 'Pcs')
                        '{{ $ps->nama_barang }}',
                    @endif
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach ($barang as $ps)
                        @if ($ps->jenis == 'Pcs')
                            '{{ $ps->stok }}',
                        @endif
                    @endforeach
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#DF0697',
                    '#00FFD4', '#FF0000', '#CDFF00', '#00A6FF', '#4600FF', '#FF00F0', '#FBFF00', '#8FFF00',
                    '#0000FF'
                ],
            }]
        }

        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })
    </script> --}}

    <script>
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                @foreach ($barang as $ps)
                    @if ($ps->jenis == 'Pack')
                        '{{ $ps->nama_barang }}',
                    @endif
                @endforeach
            ],
            datasets: [{
                data: [
                    @foreach ($barang as $ps)
                        @if ($ps->jenis == 'Pack')
                            '{{ $ps->jumlah }}',
                        @endif
                    @endforeach
                ],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de', '#DF0697',
                    '#00FFD4', '#FF0000', '#CDFF00', '#00A6FF', '#4600FF', '#FF00F0', '#FBFF00', '#8FFF00',
                    '#0000FF'
                ],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        const satuan = document.getelementById('satuan');
        satuan.addEventListener('change', satuanbarang);

        function satuanbarang() {
            console.log(satuan.value);
        }
    </script>
@endpush
