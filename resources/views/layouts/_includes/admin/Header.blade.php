<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="/dashboard2/assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="/dashboard2/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <link href="/dashboard2/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="/dashboard2/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="/dashboard2/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />

    <!-- loader-->
    <link href="/dashboard2/assets/css/pace.min.css" rel="stylesheet" />
    <script src="/dashboard2/assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="/dashboard2/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/dashboard2/assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
    <link href="/dashboard2/assets/css/app.css" rel="stylesheet">
    <link href="/dashboard2/assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="/dashboard2/assets/css/dark-theme.css" />
    <link rel="stylesheet" href="/dashboard2/assets/css/semi-dark.css" />
    <link rel="stylesheet" href="/dashboard2/assets/css/header-colors.css" />
    {{-- sweetalert --}}
    <link rel="stylesheet" href="/css/sweetalert2.css">
    <script src="/js/sweetalert2.all.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Protecção contra clickJacking --}}
    {!! header('X-Frame-Options: SAMEORIGIN') !!}
    <link href="/dashboard2/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>@yield('title')</title>
</head>

<body>
