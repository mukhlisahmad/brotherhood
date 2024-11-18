
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        @if($web && $web->name)
        <link rel="icon" type="image/png" href="{{ asset('storage/images/'. $web->name)}}">
        @else
                    <p class="text-center">Belum ada foto</p>
                @endif
        <title>
           {{ $title }}
        </title>

    </head>

    <body class="">
        <div class="container ">

        </div>
        <main class="main">
            @yield('content')
        </main>

    </body>

</html>
