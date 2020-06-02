<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('favicon.ico') }}">

    <title>@yield('page-title') | Browser 測試示範</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('page-style')
</head>

<body class="bg-light">

@yield('page-content')

<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

@yield('page-script')

</body>
</html>
