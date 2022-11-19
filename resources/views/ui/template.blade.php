{{-- 

    Main Template
    ==============

--}}
<html>
    <head>
        <title>Certigon Test</title>

        <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" href="{{ asset('assets/css/fa/css/all.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

        <script src="{{ asset('assets/js/jquery.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    </head>
    <body>
        <div class="container-fluid p-0 m-0 position-absolute w-100 min-vh-100 bg-light">
            @yield('pageContent')
        </div>
    </body>
</html>