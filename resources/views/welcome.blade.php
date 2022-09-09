<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Welcome</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <!-- Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .company_name{
            background: #00308F;
            border-radius: 1%;
        }

    </style>
</head>

<body class="bg-my">
{{-- @if (auth()->user()->status == false) --}}
    <div class="mt-5">
        <div class="header d-flex flex-column align-items-center">
            <div class="company_name px-5 py-3 mt-5 text-white">
                <h1 class="my-3">Meta Health System</h1>
                <h5>Your account has already been registered. Wait Admin for Active Your Acount</h5>
                <form action="{{ route('logout') }}" method="post" class="my-2" id="logout-form">
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
