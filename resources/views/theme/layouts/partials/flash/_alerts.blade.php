@if (Session::has('alert:info'))
    <div class="alert alert-info">
        {{ Session::get('alert:info') }}
        <span class="alert-close">&times;</span>
    </div>
@endif

@if (Session::has('alert:success'))
    <div class="alert alert-success">
        {{ Session::get('alert:success') }}
        <span class="alert-close">&times;</span>
    </div>
@endif

@if (Session::has('alert:warning'))
    <div class="alert alert-warning">
        {{ Session::get('alert:warning') }}
        <span class="alert-close">&times;</span>
    </div>
@endif

@if (Session::has('alert:error'))
    <div class="alert alert-error">
        {{ Session::get('alert:error') }}
        <span class="alert-close">&times;</span>
    </div>
@endif
