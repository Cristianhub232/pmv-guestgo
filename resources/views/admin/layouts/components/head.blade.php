<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ isset($sitetitle) ? ucfirst($sitetitle) : "Bienvenidos Al SENIAT" }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- fav icon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/site_logo2.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/@fortawesome/fontawesome-free/css/all.min.css') }}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('assets/modules/izitoast/dist/css/iziToast.min.css') }}">
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">




</head>