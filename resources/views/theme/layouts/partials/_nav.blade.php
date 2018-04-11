<nav class="nav">
    <div class="container">
        @include('theme.layouts.partials._navLinks')

        {{-- End Nav --}}

        @if (app('request')->url() != route('home'))
            @include('theme.layouts.partials._socialLinks')
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


