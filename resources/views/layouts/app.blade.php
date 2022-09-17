<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
        <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />

    <!-- Custom Js -->
    <script src="{{ asset('js/app.js') }}"></script>
    
    <style>
        .card .re {
            padding: .7% 0;
            border-radius: 15px;
            border-bottom: 2px solid rgb(233, 231, 231);
            margin-bottom: 5px
        }

        .card .re .co-num {
            background-color: #315399;
            padding: 1px 5px;
            border-radius: 5px;
            margin-top: 3px;
            height: 20px;
            font-size: 13px;
            color: #fff;
        }

        #arrow {
            cursor: pointer;
            float: right;
            background-color: #315399;
            color: #fff;
            border-radius: 50%;
            padding: 1px 4px;
            font-size: 14px;
            margin-top: 3px;
            margin-bottom: 6px;
            height: 22px;
            line-height: 1.5;
        }

        .btn-comment {
            background-color: #000;
            border: none;
            color: #fff;
        }

        aside .navbar-collapse {
            height: 1000px;
        }

        .table-responsive tfoot {
            display: none
        }

        table {
            border-bottom: 1px solid #315399
        }

        #session_img {
            float: left;
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 7px;
            cursor: pointer;
        }

        .full_screen.active {
            position: absolute;
            width: 100%;
            height: 100%;
            background: #00257062;
            z-index: 1000;
        }
        .full_screen .closee{
            position: fixed;
            top: 60px;
            right: 70px;
            padding: 3px 12px;
            cursor: pointer;
            color: #fff;
            font-size: 20px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.384);
        }
        
        .deletee {
            position: absolute;
            top: 0px;
            right: 0.5rem !important;
            padding: 3px 12px;
            cursor: pointer;
            color: #fff;
            border-radius: 0 0 0 15px;
            background: rgba(0, 0, 0, 0.493);
            opacity: .5;
            transition: 0.4s;
        }
        .deletee:hover{
            opacity: 1;
        }
    </style>

</head>

<body class="g-sidenav-show bg-gray-200">
    <div class="full_screen hid active"></div>
    <!-- Sidebar -->
    @include('partial.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        @include('partial.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    @include('partial.footer')
    @stack('js')
</body>

</html>
