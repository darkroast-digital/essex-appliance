<nav class="nav">
    <div class="container">
        <a href="{{ route('home') }}" class="nav-brand">{{ env('APP_NAME') }}</a>
        <ul class="nav-menu">
                <li><a href="{{ route('home') }}">Home</a></li>
            </ul>
            <div class="hamburger off-canvas-trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
    </div>
</nav>


