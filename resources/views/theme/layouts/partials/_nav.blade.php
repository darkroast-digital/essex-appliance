<nav class="nav">
    <div class="container">
        <ul class="nav-menu {{ app('request')->url() == route('home') ? 'full' : '' }}">
            <li><a href="{{ route('home') }}" class="{{ app('request')->url() == route('home') ? 'active' : '' }}">Home</a></li>
            <li><a href="{{ route('products') }}" class="{{ app('request')->url() == route('products') ? 'active' : '' }}">Products</a></li>
            <li><a href="" {{-- class="{{ app('request')->url() == route('promotions') ? 'active' : '' }}" --}}>Promotions</a></li>
            <li><a href="" {{-- class="{{ app('request')->url() == route('sales') ? 'active' : '' }}" --}}>In-Store Sales</a></li>
            <li><a href="" {{-- class="{{ app('request')->url() == route('services') ? 'active' : '' }}" --}}>Services</a></li>
            <li><a href="" {{-- class="{{ app('request')->url() == route('discover') ? 'active' : '' }}" --}}>Discover</a></li>
            <li><a href="" {{-- class="{{ app('request')->url() == route('contact') ? 'active' : '' }}" --}}>Contact Us</a></li>
        </ul>

        {{-- End Nav --}}

        @if (app('request')->url() != route('home'))
            <div class="socials">
                <a href="" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="" target="_blank"><i class="fab fa-google-plus"></i></a>
                <a href="" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="" target="_blank"><i class="fab fa-pinterest"></i></a>
            </div>
        @endif

        {{-- End Socials --}}

        <div class="hamburger off-canvas-trigger">
            <span></span>
            <span></span>
            <span></span>
        </div>

        {{-- End Hamburger --}}
    </div>
</nav>


