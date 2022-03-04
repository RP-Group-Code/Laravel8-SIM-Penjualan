<style>
    .box {
        padding: 50px;
        box-shadow: 0.5px 11px rgba(0, 0, 0, .3);
        overflow: hidden;
        color: #000;
    }

</style>
<!-- Navbar -->
<nav class="head main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="font-size: 20px" href="{{ url('dashboard') }}" class="nav-link">Beranda</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="font-size: 20px" href="#" class="nav-link">About</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <div class="navbar-custom-menu ml-auto">
        <ul class="navbar-nav ml-auto">
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span style="font-size: 6px" class="badge badge-warning navbar-badge">
                        <div class="count_pengajuan">

                        </div>
                        {{$pengajuan_count}}
                    </span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link" role="button">
                    <i class="fas fa-sign-out-alt"></i>
                    <label data-bs-toggle="modal" data-bs-target="#exampleModallogout" style="cursor: pointer;">Logout</label>
                </a>
            </li>

            <li class="nav-item mr-3">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

        </ul>

    </div>

</nav>
 <!-- Modal -->
<div class="modal fade" id="exampleModallogout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
            </div>
            <div align="center" class="modal-body">
                <div class="tanya">
                   <h5>
                    <small>Apakah anda yakin ingin keluar sistem ?</small>
                    </h2>
                </div>
                <div class="img">
                    <img src="{{ url('') }}/img/logout-light.gif" width='190px' height='185px' alt="User Image">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-bs-dismiss="modal">Batal</button>
                <a href="{{ route('logout') }}" type="button" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- /.navbar -->
