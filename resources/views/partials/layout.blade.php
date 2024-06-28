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
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <link rel="shortcut icon" href="{{ asset('img/logo_tab.png') }}" />
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
    <script src="https://twitter.github.io/typeahead.js/releases/latest/typeahead.bundle.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script type="text/javascript">
        $(window).on('load', function() {
            $(".se-pre-con").fadeOut("slow");
        });

        window.onload = function() {
            clock();

            function clock() {
                var now = new Date();
                var TwentyFourHour = now.getHours();
                var hour = now.getHours();
                var min = now.getMinutes();
                var sec = now.getSeconds();
                var mid = 'PM';
                if (min < 10) {
                    min = "0" + min;
                }
                if (hour > 12) {
                    hour = hour - 12;
                }
                if (hour == 0) {
                    hour = 12;
                }
                if (TwentyFourHour < 12) {
                    mid = 'AM';
                }
                document.getElementById('time').innerHTML = hour + ':' + min + ' ' + mid;
                setTimeout(clock, 1000);
            }
        }

        $('.scroll_container').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            dots: false,
            infinite: true,
            speed: 1000,
            slidesToShow: 2,
            arrows: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        infinite: true,
                    }
                }
            ]
        });

        $('#datepicker').datepicker({
            format: 'mm/dd/yyyy',
            todayHighlight: true,
            autoclose: true
        });

        $('#search').keypress(function(e) {
            if (e.which === 13) {
                e.preventDefault();
                var search_val = $("input[name='search_field_web']").val();
                window.location.href =
                    `/home?keyword=${search_val}`;
            }
        });

        $('#search_web').click(function(e) {
            var search_val = $("input[name='search_field_web']").val();
            window.location.href =
                `/home?keyword=${search_val}`;
        });

        $('#filter_all').click(function(e) {
            var search_val = $("input[name='search_field_web']").val();
            var deadline_val = $("select[id='order-by-deadline']").val();
            var title_val = $("select[id='order-by-title']").val();
            var priority_val = $("select[id='order-by-priority']").val();
            window.location.href =
                `/home?keyword=${search_val}&order_by_deadline=${deadline_val}&order_by_title=${title_val}&order_by_priority=${priority_val}`;
        });

        $('#reset').click(function(e) {
            window.location.href =
                `/home`;
        })

        $('#search_dltoday').keypress(function(e) {
            if (e.which === 13) {
                e.preventDefault();
                var search_val = $("input[name='search_field_dltoday']").val();
                window.location.href =
                    `/task/deadline-today?keyword=${search_val}`;
            }
        });

        $('#search_dltoday_web').click(function(e) {
            var search_val = $("input[name='search_field_dl_today']").val();
            window.location.href =
                `/task/deadline-today?keyword=${search_val}`;
        });

        $('#filter_all_today').click(function(e) {
            var search_val = $("input[name='search_field_dltoday']").val();
            var deadline_val = $("select[id='order-by-deadline-today']").val();
            var title_val = $("select[id='order-by-title-today']").val();
            var priority_val = $("select[id='order-by-priority-today']").val();
            window.location.href =
                `/task/deadline-today?keyword=${search_val}&order_by_deadline=${deadline_val}&order_by_title=${title_val}&order_by_priority=${priority_val}`;
        });

        $('#reset_today').click(function(e) {
            window.location.href =
                `/task/deadline-today`;
        })
    </script>
</body>

</html>
