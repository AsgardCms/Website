<!DOCTYPE html>
<html class="bg-black">
<head>
    <meta charset="UTF-8">
    <title>
        @section('title')
            {{ Setting::get('core::site-name') }}
        @show
    </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/bootstrap.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/ionicons.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/alertify/alertify.core.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/vendor/datatables/dataTables.bootstrap.css') }}"/>
    <link rel="stylesheet" href="{{ asset('themes/adminlte/css/AdminLTE.css') }}"/>

    <script src="{{ asset('themes/adminlte/js/vendor/jquery.min.js') }}"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="bg-black">

<div class="form-box" id="login-box">
    @yield('content')
</div>

<!-- Bootstrap -->
<script src="{{ asset('themes/adminlte/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/adminlte/js/vendor/alertify/alertify.js') }}"></script>
</body>
</html>
