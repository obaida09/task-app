<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('assets/css/material-dashboard.css') }}" rel="stylesheet" />
    <!-- Custom Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .card .re{
            padding: .7% 0;
            border-radius: 15px;
            border-bottom: 2px solid rgb(233, 231, 231);
            margin-bottom: 5px 
        }
        .card .re .co-num{
            background-color:  #315399;
            padding: 1px 5px;
            border-radius: 5px;
            margin-top: 3px;
            height: 20px;
            font-size: 13px;
            color: #fff;
        }
     
        #arrow{
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
        
        .btn-comment{
            background-color: #000;
            border: none;
            color: #fff;
        }
    </style>

</head>

<body class="g-sidenav-show  bg-gray-200">

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
    
    <!-- Setting -->
    @include('partial.setting')
    
    <!-- Footer -->
    @include('partial.footer')
    @stack('js')
</body>

</html>
