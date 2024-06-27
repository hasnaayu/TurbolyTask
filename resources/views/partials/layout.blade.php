<!DOCTYPE html>
<html lang="en">

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>TurbolyTask</title>
    <meta name="description" content="Your Task" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    {{-- <link href="{{ asset('assets/css/auth.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="shortcut icon" href="{{ asset('img/logo_tab.png') }}" />

    <style>
        .se-pre-con {
            position: fixed;
            display: block;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            text-align: center;
            opacity: 1;
            background-color: #fff;
            z-index: 99;
        }

        #loading_item {
            position: fixed;
            top: 50%;
            left: 50%;
            z-index: 100;
        }

        .base_color {
            color: #58B0E2;
        }
    </style>
</head>

<body>
    <div class="se-pre-con">
        <div class="spinner-border base_color" style="width: 3rem; height: 3rem;" role="status" id="loading_item">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <div id="header">
        @include('partials.header')
    </div>

    <div id="content">
        @yield('contents')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
        });
    </script>
</body>

</html>
