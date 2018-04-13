<nav class="nav">
    <div class="nav__container container">
        <ul class="nav-menu {{ app('request')->url() == route('home') ? 'full' : '' }}">
            @include('theme.layouts.partials._navLinks')
        </ul>

        {{-- End Nav --}}

        @if (app('request')->url() != route('home'))
            @include('theme.layouts.partials._socialLinks')
        @endif

        {{-- End Socials --}}

        <div class="hamburger off-canvas-trigger main-nav">
            <span></span>
            <span></span>
            <span></span>
        </div>

        {{-- End Hamburger --}}

    </div>
</nav>


