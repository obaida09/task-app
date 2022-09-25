<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ $data['patient_name'] }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <!-- Favicon -->
    <link rel="icon" href="./images/favicon.png" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"
        integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kalam:wght@300;400;700&display=swap" rel="stylesheet">


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;700&display=swap"
        rel="stylesheet">

    {{-- PDF download --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

    <!-- Invoice styling -->
    <style>
        /* fonts */
        .Montserrat {
            font-family: 'Montserrat', sans-serif;
        }

        .kalam {
            font-family: 'Kalam', cursive;
        }

        .ls {
            letter-spacing: 1px;

        }

        .dn {
            display: none;
        }

        body {
            font-family: 'Roboto', sans-serif;
            overflow-x: scroll;
        }

        /* waves Styles */
        .wave {
            z-index: -1;
            width: 50%;
            position: absolute;
            top: 0;
            right: 0;
            margin: -10px 0 0 0;
        }

        .wave2 {
            margin: -30px 0 0 0;
        }

        .wave3 {
            transform: rotate(180deg);
            margin: 0 0 -60px 0;
            bottom: 0;
            left: 0;
        }

        .wave4 {
            transform: rotate(180deg);
            margin: 0 0 -80px 0;
            bottom: 0;
            left: 0;
        }

        /* .m2-auto {
            width: 1000px;
            margin: 100px auto
        } */

        .rag {
            width: 100%;
            position: relative;
            box-shadow: 5px 5px 11px #ccc;
            overflow: hidden;
        }

        /* header */
        .head .logo {
            float: right;
        }

        .name {
            font-size: 20px;
            font-weight: 500;
        }

        .name span {
            font-weight: bold;
            color: #ee9714;
        }

        /* pateint details */
        .section {
            font-size: 18px;
            padding-left: 30px
        }

        .dotted {
            border-bottom: dotted 3px #ee9714e3;
            line-height: 0.1;
        }

        /* session notes */
        .hr {
            text-align: center;
            margin: 40px 40px 0 40px;
            border-bottom: 1px solid rgb(161, 161, 161);
            opacity: .7;
        }

        .hr hr {
            z-index: -1;
            margin-bottom: -15px
        }

        .hr span {
            z-index: 20;
            margin-top: 20px;
            font-family: 'Montserrat', sans-serif;
            padding: 10px 20px;
            background: #ffffff;
        }

        .content {
            font-family: 'Kalam', cursive;
            position: relative;
            height: 406px;
            font-size: 21px;
            line-height: 1.5;
            color: #666;
        }

        .w-10 {
            z-index: -1;
            position: absolute;
            top: 7%;
            left: 20%;
            width: 400px;
            opacity: 0.2;
        }

        /* footer styles */
        .footer {
            position: relative;
            height: 90px;
        }

        .footer hr {
            margin: 20px auto;
            width: 90%;
            height: 4px;
            background: rgb(8, 0, 29);
            border: none;
            border-radius: 40%;
            overflow: hidden;
        }

        .footer h3 {
            float: right;
            padding-right: 120px;
            color: #0149a8;
            text-shadow: 1px 6px 5px #1418ee41;
        }
    </style>
</head>

<body>
    <div class="m2-auto">
        <div class="rag px-5 py-3">
            <div class="wave">
                <svg viewBox="0 0 500 200" preserveAspectRatio="xMinYMin meet">
                    <path d="M0,0 C150,250 430,0 500,200 L500,00 L0,0 Z" style="stroke: none; fill:#3f8df3;"></path>
                </svg>
            </div>
            <div class="wave wave2">
                <svg viewBox="0 0 500 200" preserveAspectRatio="xMinYMin meet">
                    <path d="M0,0 C150,250 430,0 500,200 L500,00 L0,0 Z" style="stroke: none; fill:#1877f3;"></path>
                </svg>
            </div>
            <div class="head row mt-5 pt-5">
                <div class="col-7 logo"><img src="{{ asset('img/logo.png') }}" alt=""></div>
                <div class="col-5 name mt-5 Montserrat text-center"><span class="dr">DR.
                    </span>{{ $data['healer_name'] }}</div>
            </div>
            <div class="hr">

                <span>Invoice</span>
            </div>
            <div class="section my-5">
                <div class="row">
                    <div class="col-7"><span class="Montserrat ls">Name: </span><span
                            class="kalam mx-1 px-1 dotted">{{ $data['patient_name'] }}</span></div>
                    <div class="col-5"><span class="Montserrat ls">Moblie: </span><span
                            class="kalam mx-1 px-1 dotted">{{ $data['patient_mobile'] }}</span></div>
                </div>
                <div class="row mt-4">
                    <div class="col-7"><span class="Montserrat ls">Session Price: </span><span
                            class="kalam mx-1 dotted">{{ $data['session_price'] }}</span></div>
                    <div class="col-5"><span class="Montserrat ls">Session's: </span><span
                            class="kalam mx-1 px-2 dotted">{{ $data['sessions_num'] }}</span></div>

                </div>
                <div class="row mt-4">
                    <div class="col-7"><span class="Montserrat ls">Total Price: </span><span
                            class="kalam mx-1 dotted">{{ $data['priceBefore'] }} / {{ $data['discount'] }}% =
                            {{ $data['priceAfter'] }} IQD</span></div>
                    <div class="col-5"><span class="Montserrat ls">Date: </span><span
                            class="kalam mx-1 dotted">{{ $data['date'] }}</span></div>
                </div>
            </div>
            <div class="hr">

                <span>Notes</span>
            </div>
            <div class="content mt-4 pt-1 px-4">
                {{ $data['notes'] }}
                <div>
                    <img class="w-10" src="{{ asset('img/MHI.png') }}" alt="">
                </div>
            </div>
            <div class="footer">
                <hr>
                <h3 class="pt-3">Meta Healty System</h3>
            </div>
            <div class="wave wave3">
                <svg viewBox="0 0 500 200" preserveAspectRatio="xMinYMin meet">
                    <path d="M0,0 C150,250 430,0 500,200 L500,00 L0,0 Z" style="stroke: none; fill:#3f8df3;"></path>
                </svg>
            </div>
            <div class="wave wave4">
                <svg viewBox="0 0 500 200" preserveAspectRatio="xMinYMin meet">
                    <path d="M0,0 C150,250 430,0 500,200 L500,00 L0,0 Z" style="stroke: none; fill:#1877f3;"></path>
                </svg>
            </div>
        </div>
    </div>
    <script>
        window.onload = function() {
            window.print();
            setTimeout(function() {
                document.location.href = '{{ route('session.index') }}';
            }, 10);
        };
    </script>

</body>

</html>
