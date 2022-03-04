<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layout/style')
    <style>
        .title {
            width: 10px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
    <div id="loading" style="display:none"></div>

    <div class="wrapper">
        {{-- ini header --}}
        @includeIf('layout/header')
        {{-- ini sidebar --}}
        @includeIf('layout/sidebar')

        <div class="content-wrapper">
            {{-- @stack('before-content') --}}
            @yield('content')
            @include('sweetalert::alert')

            {{-- @stack('after-content') --}}
        </div>

        @includeIf('layout/footer')
    </div>
    @includeIf('layout/script')
    @stack('scripts')
</body>

</html>
