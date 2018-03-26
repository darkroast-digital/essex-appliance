<nav class="nav">
        <div class="container">
            <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ secure_url('panel/img/logo.svg') }}" alt="{{ env('APP_NAME') }}" draggable="false">
            </a>
    
            <!-- /.nav-brand -->
    
            <ul class="nav-menu">
                <li class="dropdown">
                    <a href="{{ route('panel.dashboard') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z" class="icon" />
                        </svg>
                        Dashboard
                    </a>

                    <ul class="menu">
                        
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="{{ route('panel.products.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M0 10V2l2-2h8l10 10-10 10L0 10zm4.5-4a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" class="icon" />
                        </svg>
                        Products
                    </a>

                    <ul class="menu">
                        
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#0">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M5 5a5 5 0 0 1 10 0v2A5 5 0 0 1 5 7V5zM0 16.68A19.9 19.9 0 0 1 10 14c3.64 0 7.06.97 10 2.68V20H0v-3.32z" class="icon" />
                        </svg>
                        Users
                    </a>

                    <ul class="menu">
                        
                    </ul>
                </li>
            </ul>
    
            <!-- /.nav-menu -->

            <div class="nav-user">
                <a href="#0">
                    {{ auth()->user()->name }}
                </a>
                <div class="avatar avatar-small">
                    <img src="https://www.gravatar.com/avatar/{{ md5(auth()->user()->email) }}/?d=retro" draggable="false">
                </div>
            </div>
    
            <div class="hamburger off-canvas-trigger">
                <span></span>
                <span></span>
                <span></span>
            </div>
    
            <!-- /.hamburer -->
    
        </div>
    </nav>
    
    
    