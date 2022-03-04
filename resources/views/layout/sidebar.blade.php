<style>
    a {
        color: #007bff;
        text-decoration: none;
        background-color: transparent;
    }

    .logo-brand {
        color: #ffffff;
    }

</style>

<aside class="main-sidebar sidebar-dark-primary" style="position:fixed">
    <!-- Brand Logo -->
    <div class="logo-brand">
        <div class="content mt-3">
            <center>
                <h4 style="font-size: 15px">Sistem Informasi <br> Manajemen Penjualan</h4>
            </center>
        </div>
    </div>

    <!-- Sidebar -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image mt-2">
            </div>
            <div class="info">
                <div class="namauser" style="font-size: 18px">
                    {{-- <a href="">
                        Maruli Hasurungan
                    </a> --}}
                    <a href="#" class="d-block" data-id="get-user"
                        style="color: rgb(255, 255, 255)">{{ Session::get('user')[0]['nama'] }}
                    </a>
                </div>
                <div class="online" style="font-size: 12px">
                    <a style="color: rgb(255, 255, 255)">
                        @if (Session::get('user')[0]['status'] == 'Active')
                            <i class="fa fa-circle text-success"></i>
                            &nbsp; {{ Session::get('user')[0]['status'] }}
                        @elseif (Session::get('user')[0]['status'] == 'Half Active')
                            <i class="fa fa-circle text-warning"></i>
                            &nbsp;{{ Session::get('user')[0]['status'] }}
                        @else
                            <i class="fa fa-circle text-danger"></i>
                            &nbsp;{{ Session::get('user')[0]['status'] }}
                        @endif

                    </a>
                </div>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-3">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ url('dashboard') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a href="{{ url('students') }}" class="nav-link ">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Student
                        </p>
                    </a>
                </li> --}}
                @if (session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Manager' || session('user')[0]['jabatan'] == 'Karyawan')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tie"></i>
                            <p class="ml-2">
                                Suplier
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('supliers.index') }}" class="nav-link">
                                    <i class="fas fa-eye mr-2 ml-2"></i>
                                    <p>Lihat</p>
                                </a>
                            </li>
                            @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Developer')
                                <li class="nav-item">
                                    <a href="{{ route('supliers.create') }}" class="nav-link "
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-plus mr-2 ml-2"></i>
                                        <p>Tambah</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif

                @if (session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Kasir')
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="fa fa-box"></i>
                            <p class="ml-2" style="font-size: 15px">
                                Data Bahan Baku
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('barangs.index') }}" class="nav-link">
                                    <i class="fas fa-eye mr-2 ml-2"></i>
                                    <p>Lihat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('barangs.create') }}" class="nav-link" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    <i class="fas fa-plus mr-2 ml-2"></i>
                                    <p>Tambah</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (session('user')[0]['jabatan'] == 'Admin' || session('user')[0]['jabatan'] == 'Developer')
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck-loading"></i>
                            <p class="ml-2" style="font-size: 15px">
                                Pembelian Barang
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview" style="font-size: 16px">
                            <li class="nav-item">
                                <a href="{{ route('barang_masuks.index') }}" class="nav-link">
                                    <i class="fas fa-eye ml-2 mr-2"></i>
                                    <p>Lihat</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('barang_masuks.create') }}" class="nav-link"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    <i class="fas fa-plus ml-2 mr-2"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Manager')
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="fas fa-truck-loading"></i>
                            <p class="ml-2" style="font-size: 15px">
                                Penjualan Barang
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('barang_keluars.index') }}" class="nav-link">
                                    <i class="fas fa-eye mr-2 ml-2"></i>
                                    <p>Lihat</p>
                                </a>
                            </li>
                            @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer')
                                <li class="nav-item">
                                    <a href="#" class="nav-link" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        <i class="fas fa-plus mr-2 ml-2"></i>
                                        <p>Tambah</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif

                @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Manager')
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="fas fa-paste"></i>
                            <p class="ml-2" style="font-size: 15px">
                                Laporan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (session('user')[0]['jabatan'] == 'Kasir' || session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Manager')
                                <li class="nav-item">
                                    <a href="{{ route('laporan_barangkeluars.laporan') }}" class="nav-link">
                                        <i class="fas fa-print ml-2"></i>
                                        <p>Cetak Laporan</p>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>
                @endif
                @if (session('user')[0]['jabatan'] == 'Developer' || session('user')[0]['jabatan'] == 'Manager')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-users"></i>
                            <p class="ml-2">
                                Account
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('akuns.index') }}" class="nav-link">
                                    <i class="fas fa-user-check mr-2"></i>
                                    <p>Lihat User</p>
                                </a>
                            </li>
                            @if (session('user')[0]['jabatan'] == 'Developer')
                                <li class="nav-item">
                                    <a href="{{ route('akuns.create') }}" class="nav-link"
                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-user-plus mr-2 ml-2"></i>
                                        <p>Tambah User</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
