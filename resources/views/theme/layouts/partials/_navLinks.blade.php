<li><a href="{{ route('home') }}" class="{{ app('request')->url() == route('home') ? 'active' : '' }}">Home</a></li>
<li class="dropdown"><a href="{{ route('products') }}" class="{{ (app('request')->url() == route('products')) && (app('request')->query('featured') != 1) ? 'active' : '' }}">Products</a>
    
    @include('theme.layouts.partials._megaMenu')

</li>
<li><a href="{{ route('products') }}?featured=1" class="{{ app('request')->query('featured') == 1 ? 'active' : '' }}">In-Store Sales</a></li>
<li><a href="{{ route('services') }}" class="{{ app('request')->url() == route('services') ? 'active' : '' }}">Services</a></li>
<li><a href="{{ route('discover') }}" class="{{ app('request')->url() == route('discover') ? 'active' : '' }}">Discover</a></li>
<li><a href="{{ route('contact') }}" class="{{ app('request')->url() == route('contact') ? 'active' : '' }}">Contact Us</a></li>