    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="@yield('meta_desription','Booking hotel laravel application')" />
        <meta name="author" content="" />
        <title>@yield('meta_title','Booking Laravel')</title>
        {{-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" /> --}}
        <link href="{{asset('admin/css/styles.css')}}" rel="stylesheet" />
        <link href="{{asset('admin/css/custom.css')}}" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>

        @stack('customCss')
    </head>