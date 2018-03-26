<nav class="nav">
        <div class="container">
            <a href="{{ route('home') }}" class="nav-brand">
                <img src="{{ secure_url('panel/img/logo.svg') }}" alt="{{ env('APP_NAME') }}" draggable="false">
            </a>
    
            <!-- /.nav-brand -->
    
            <ul class="nav-menu">
                <li>
                    <a href="{{ route('home') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20">
                            <path d="M8 20H3V10H0L10 0l10 10h-3v10h-5v-6H8v6z" class="icon" />
                        </svg>
                        Dashboard
                    </a>
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
    
    
    