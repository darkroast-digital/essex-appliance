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

    <link rel="stylesheet" href="{{ secure_asset('panel/css/app.css') }}">

    <!-- Mobile Theme Colour -->

    <meta name="theme-color" content="#D82232">

    <!-- Title and Description -->

    <title></title>

    <!-- Favicons -->

    <link rel="icon" href="">

</head>
<body>

    @include('panel.layouts.partials.flash._alerts')

    {{--  /alerts  --}}
    
    <div id="app">

        @include('panel.layouts.partials._offCanvas')

        <!-- /.off-canvas -->

        <div class="overlay"><span class="overlay-close">&times;</span></div>

        <!-- /.overlay -->

        @include('panel.layouts.partials._nav')

        <main class="content">
            @yield('content')
        </main>

        <!--  /.content -->

        @include('panel.layouts.partials._footer')

        <!-- /.footer -->

    </div>

    <!-- /#app -->

    <script src="{{ secure_asset('panel/js/app.js') }}"></script>

    <!-- See you space cowboy... -->
</body>
</html>
