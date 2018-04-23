<div class="off-canvas products-off-canvas">
    
    <div class="displays">
        @include('theme.layouts.partials._productDisplays')
    </div>

    <hr>

    <h2>Shop By</h2>

    <div class="categories">
        <h3>Categories</h3>
        <categories-list api="{{ route('api.categories.index') }}"></categories-list>
    </div>

    <hr>

    <div class="brands">
        <h3>Brands</h3>
        <brands-list api="{{ route('api.brands.index') }}"></brands-list>
    </div>

    <hr>

    <div class="colors">
        <h3>Colors</h3>
        <colors-list api="{{ route('api.colors.index') }}"></colors-list>
    </div>

</div>
