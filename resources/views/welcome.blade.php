<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0;
            background: rgb(0, 25, 128);
            background: linear-gradient(90deg, rgb(48, 73, 175) 0%, rgb(65, 110, 216) 26%, rgb(164, 192, 221) 100%);
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        
        .c{
            margin-top: 10%;

        }
        .company_name{
            background: rgba(255, 32, 32, 0.76);
            width: 50%;
            padding: 1% 3%;
            border-radius: 1%;
        }
        .company_name h1{
            margin-top: 3%;
            color: rgb(253, 252, 252)
        }
        .company_name h5{
            margin-top: 3%;
            color: rgb(230, 230, 230)
        }
    </style>
</head>

<body>
{{-- @if (auth()->user()->status == false) --}}
    <div class="c">
        <div class="header d-flex flex-column align-items-center">
            <div class="company_name">
                <h1>Meta Health System</h1>
                <h5>Your account has already been registered. Wait Admin for Active Your Acount</h5>
                <form action="{{ route('logout') }}" method="post" id="logout-form">
                    @csrf
                    <button class="btn btn-primary btn-sm mt-3" type="submit">logout</button>
                </form>
            </div>
        </div>
    </div>
{{-- @endif --}}

    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>
