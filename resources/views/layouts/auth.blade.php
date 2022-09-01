<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css?v=3.0.0') }}" rel="stylesheet" />

</head>

<body class="bg-my">
    <!-- Main content -->
    <div class="container-fluid py-4">
        <div class="">
            @yield('auth-content')
        </div>
    </div>
    <!--   Core JS Files   -->
    <link href="{{ asset('assets/js/core/popper.min.js') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/core/bootstrap.min.js') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}" rel="stylesheet" />
    <link href="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}" rel="stylesheet" />
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <link href="{{ asset('assets/js/material-dashboard.min.js?v=3.0.4') }}" rel="stylesheet" />
</body>

</html>
