<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Viewport Meta -->

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Styles -->

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>

    <link rel="stylesheet" href="{{ secure_asset('theme/css/app.css') }}">

    <!-- Mobile Theme Colour -->

    <meta name="theme-color" content="#D82232">

    <!-- Title and Description -->

    <title></title>
    <meta type="keywords" content="">
    <meta type="description" content="">

    <!-- Favicons -->

    <link rel="icon" href="">

    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:site_name" content="">
    <meta property="og:image" content="">

</head>
<body>

    @include('theme.layouts.partials.flash._alerts')

    {{--  /alerts  --}}
    
    <div id="app">

        @include('theme.layouts.partials._nav')

        <!-- /.nav -->

        @include('theme.layouts.partials._offCanvas')

        <!-- /.off-canvas -->

        <div class="overlay"><span class="overlay-close">&times;</span></div>

        <!-- /.overlay -->

        <main class="content">
            @yield('content')
        </main>

        <!--  /.content -->

        @include('theme.layouts.partials._footer')

        <!-- /.footer -->

    </div>

    <!-- /#app -->

    <script src="{{ secure_asset('theme/js/app.js') }}"></script>

    <!-- See you space cowboy... -->
</body>
</html>
