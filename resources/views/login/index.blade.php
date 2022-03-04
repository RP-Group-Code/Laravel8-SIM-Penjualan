<!DOCTYPE html>
<html lang="en">

@if (session()->has('success'))
    <div class="alert alert-succes alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismis="alert" arial-label="Close">
        </button>
    </div>
@endif



<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIM Penjualan ATK | Log in</title>
    @includeIf('layout/style')

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background-image: url('/img/bg-sim.JPG');
            background-position-y: 0cm;
            background-size: cover;
            position: relative;
        }

        section {
            position: relative;
            display: flex;
            background-attachment: fixed;
            height: 100vh;
            justify-content: center;
            align-items: center;

        }

        body .login-boxs {
            width: 100%;
            position: relative;
            padding: 50px;
            box-shadow: 0px 0px 50px 5px rgba(0, 0, 0, 5);
            overflow: hidden;
            color: #dab3ff;
        }

        body .login-boxs .footer-font {
            margin-top: 15px;
            font-size: 14px;
            color: rgb(223, 0, 0);
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            text-decoration: none;

        }

        a:hover {
            color: #d4e7fa;
            text-decoration: none;
        }

    </style>
</head>

<body class="hold-transition login-page bodylogin">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if (session()->has('loginEror'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginEror') }}
                        <button type="button" class="btn-close" data-bs-dismis="alert" arial-label="Close">
                        </button>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <section>
        <div class="login-boxs">
            <div class="login-logo">
                <a style="color: #ffff" href="#"><b>SIM </b>Penjualan</a>
            </div>
            <center>
                <a style="color: #ffff" href="#"> <small> Kelompok 4 </small> </a>
            </center>
            <!-- /.login-logo -->
            <form action="{{ route('masuk') }}" method="post">
                @csrf
                <div class="form-floating mb-4 mt-5 @error('username') is-invalid @enderror">
                    <input type="text" class="form-control" name="username" id="username" placeholder="username"
                        autofocus required value="{{ old('username') }}">
                    <label style="color: rgb(0, 0, 0)" for="username">Username</label>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-floating @error('password') is-invalid
                @enderror">
                    <input type="password" name="password" class="form-control" id="floatingPassword"
                        placeholder="Password">
                    <label style="color: rgb(0, 0, 0)" for="floatingPassword">Password</label>
                    @error('password')
                        <small style="color: red">{{ $message }}</small>
                    @enderror
                </div>
                <div class="container-fluid">
                    <div class="container">
                        <div class="container">
                            <div class="Tombol mt-5">
                                <button type="submit" class="btn btn-primary btn-block swall-login mt-3">Login</button>
                            </div>
                        </div>
                    </div>
                    <!-- /.col -->
                    <!-- /.col -->
                </div>
                {{-- </center> --}}
            </form>

            <div class="footer-font social-auth-links text-center mb-3">
                <b>- Jangan Memberikan Data User atau Data Akun Anda <br> Kepada Pihak Tidak Berwenang !!! -</b>
            </div>
            <!-- /.login-card-body -->
        </div>
    </section>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>

    {{-- <script>
        $(".swall-login").on('click', function() {
                    // const user = $usernames
                    // const pass = $passwords

                    // var users = $('#floatingInput').val()
                    // var pass = $('#floatingPassword').val()

                    if (pass != pass ) {}
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href="">Why do I have this issue?</a>'
                        });
                }
    </script> --}}

    {{-- @if (session('login_eror') == true)
        <script>
            alert('Username atau Password salah')
        </script>
    @endif --}}

    <!-- /.login-box -->
    @includeIf('layout/script')
</body>

</html>
