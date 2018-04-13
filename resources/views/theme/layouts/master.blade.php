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

    <meta name="theme-color" content="#191919">

    <!-- Title and Description -->

    <title>Essex Appliance Centre | @yield('pageTitle')</title>
    <meta type="keywords" content="Essex Appliance Centre, Southwest Ontario, appliances, Essex, kitchen appliances, kitchenware, laundry appliances, stoves, refrigerators, fridges, washers, dryers, dish washers, dishwashers, freezers, microwaves, appliances, Whirlpool, Maytag, KitchenAid, Jenn-Air, Amana">
    <meta type="description" content="Essex Appliance Center is the premier place for all of your appliance needs in Southwest Ontario. With over 12,000 square feet of showroom space, and 15,000 square feet of warehouse, we have a wide selection of appliances for you to research and compare. Our knowledgeable staff are ready to assist you with expert advice and answers to your question.">

    <!-- Favicons -->

    <link rel="icon" href="/theme/img/fav.png">

    <meta property="og:title" content="Essex Appliance Centre | @yield('pageTitle')">
    <meta property="og:description" content="Essex Appliance Center is the premier place for all of your appliance needs in Southwest Ontario. With over 12,000 square feet of showroom space, and 15,000 square feet of warehouse, we have a wide selection of appliances for you to research and compare. Our knowledgeable staff are ready to assist you with expert advice and answers to your question.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="essexappliance.com">
    <meta property="og:site_name" content="Essex Appliance Centre">
    <meta property="og:image" content="/theme/img/og.jpg">

</head>
<body>

    @include('theme.layouts.partials.flash._alerts')

    {{--  /alerts  --}}
    
    <div id="app" class="@yield('pageClass')">

        @include('theme.layouts.partials._header')

        <!-- /.header -->

        @include('theme.layouts.partials._navOffCanvas')

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

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBWBh3ArM_VNOOEPMcN28pj5QQUWhsm7k0"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script src="{{ secure_asset('theme/js/app.js') }}"></script>

    <!-- See you space cowboy... -->
</body>
</html>
