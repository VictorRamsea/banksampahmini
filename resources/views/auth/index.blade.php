<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login Bank Mini</title>

    <link rel="shortcut icon" href="{{ url('/') }}/img/bg/favicon.png">
    {{-- <link rel="shortcut icon" href="{{ url('/') }}/assets/img/favicon.png"> --}}

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/feather/feather.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/icons/flags/flags.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/css/style.css">
</head>

<body>

    {{-- @@include('partials.navbar') --}}
    @yield('container')


    <script src="{{ url('/') }}/assets/js/jquery-3.6.0.min.js"></script>

    <script src="{{ url('/') }}/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ url('/') }}/assets/js/feather.min.js"></script>

    <script src="{{ url('/') }}/assets/js/script.js"></script>
</body>

</html>
