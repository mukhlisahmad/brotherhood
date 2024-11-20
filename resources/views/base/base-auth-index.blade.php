
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @if($web && $web->nmae)
        <link rel="icon" type="image/png" href="{{ asset('storage/images/'. $web->nmae)}}">
        @else
                    <p class="text-center">Belum ada foto</p>
                @endif
        <title>
           {{ $title }}
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="{{ asset('auth') }}/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="{{ asset('auth') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="{{ asset('auth') }}/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="{{ asset('auth') }}/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
    </head>

    <body class="">
        <div class="container position-sticky z-index-sticky top-0">
            <div class="row">
                <div class="col-12">
                    <!-- Navbar -->

                    <!-- End Navbar -->
                </div>
            </div>
        </div>
        <main class="main-content mt-1">
            @yield('content')
        </main>
        <!--   Core JS Files   -->
        <script src="{{ asset('auth') }}/assets/js/core/popper.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/core/bootstrap.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="{{ asset('auth') }}/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <script src="{{ asset('auth') }}/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
    </body>

</html>
