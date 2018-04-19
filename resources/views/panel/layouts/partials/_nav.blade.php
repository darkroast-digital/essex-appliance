<nav class="nav">
    <div class="container">
        <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ secure_url('panel/img/logo.svg') }}" alt="{{ env('APP_NAME') }}" draggable="false">
            </a>

        <!-- /.nav-brand -->

        <ul class="nav-menu">
            <li>
                <a href="{{ route('panel.dashboard') }}" class="{{ strpos(app('request')->url(), 'dashboard') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z" class="icon" />
                        </svg>
                        Dashboard
                    </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('panel.products.index') }}" class="{{ strpos(app('request')->url(), 'product') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M0 10V2l2-2h8l10 10-10 10L0 10zm4.5-4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" class="icon" />
                        </svg>
                        Products
                    </a>
                <ul class="menu">
                    <li><a href="{{ route('panel.products.index') }}">All Products</a></li>
                    <li><a href="{{ route('panel.products.create') }}">Add Product</a></li>
                </ul>
            </li>

            <!-- /.dropdown -->

            <li class="dropdown">
                <a href="{{ route('panel.posts.index') }}" class="{{ strpos(app('request')->url(), 'post') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none"  viewBox="0 0 20 20">
                                <path d="M2 2c0-1.1.9-2 2-2h12a2 2 0 0 1 2 2v18l-8-4-8 4V2z" class="icon"></path>
                        </svg>
                        Posts
                    </a>
                <ul class="menu">
                    <li><a href="{{ route('panel.posts.index') }}">All Posts</a></li>
                    <li><a href="{{ route('panel.posts.create') }}">Add Post</a></li>
                    <li><a href="{{ route('panel.categories', 'posts') }}">Categories</a></li>
                </ul>
            </li>

            <!-- /.dropdown -->

            <li>
                <a href="{{ route('panel.ads.index') }}" class="{{ strpos(app('request')->url(), 'ad') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                        <path d="M10 20a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm1-5h1a3 3 0 0 0 0-6H7.99a1 1 0 0 1 0-2H14V5h-3V3H9v2H8a3 3 0 1 0 0 6h4a1 1 0 1 1 0 2H6v2h3v2h2v-2z" class="icon"></path>
                    </svg>
                    Ads
                </a>
            </li>

            <!-- /li --> 

            <li class="dropdown">
                <a href="{{ route('panel.users.index') }}" class="{{ strpos(app('request')->url(), 'user') ? 'active' : '' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" class="icon" />
                        </svg>
                        Users
                    </a>
                <ul class="menu">
                    <li><a href="{{ route('panel.users.index') }}">All Users</a></li>
                    <li><a href="{{ route('panel.users.create') }}">Add User</a></li>
                </ul>
            </li>

            <!-- /.dropdown -->

        </ul>

        <!-- /.nav-menu -->

        {{-- <search-bar 
            id="{{ config('scout.algolia.id') }}"
            app-key="{{ env('ALGOLIA_SEARCH') }}"
            name="products">
        </search-bar> --}}

        <!-- /search-bar -->

        <div class="nav-user dropdown">
            <a href="#0">
                    {{ auth()->user()->name }}
                </a>
            <div class="avatar avatar-small">
                <img src="{{ auth()->user()->avatarPath() }}" draggable="false">
            </div>

            <ul class="menu">
                <li><a href="{{ route('panel.users.edit', auth()->user()->id ) }}">Account</a></li>
                <li><a href="{{ route('auth.logout') }}">Logout</a></li>
            </ul>
        </div>

        <!-- /.nav-user -->

        <div class="hamburger off-canvas-trigger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <!-- /.hamburer -->
    </div>
</nav>
