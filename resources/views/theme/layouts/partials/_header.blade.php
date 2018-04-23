<header class="header">
    <div class="top-bar">
        <div class="top-bar__container container">
            <h5>Free Delivery <i class="fas fa-truck" data-fa-transform="flip-h"></i></h5>
            <p>76 Talbot St S, Essex, ON, N8M 1A9 | <strong>519-776-6316</strong></p>
        </div>
    </div>

    {{-- End Top Bar --}}

    <div class="brand container">
        <a href="{{ route('home') }}">
            <img src="/theme/img/logo.jpg" alt="Essex Appliance Centre LTD. Sales | Service | Delivery" draggable="false">
        </a>
    
        <div class="search">
            <search-bar 
                id="{{ config('scout.algolia.id') }}"
                app-key="{{ env('ALGOLIA_SEARCH') }}"
                name="products">
            </search-bar>
        </div>
    </div>

    {{-- End Brand/Search --}}

    @include('theme.layouts.partials._nav')
</header>