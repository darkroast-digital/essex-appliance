<div class="off-canvas products-off-canvas">
    
    <div class="displays">
        @include('theme.layouts.partials._productDisplays')
    </div>

    <hr>

    <h2>Shop By</h2>

    <div class="categories">
        <h3>Categories</h3>
        @include('theme.layouts.partials._productCategories')
    </div>

    <hr>

    <div class="brands">
        <h3>Brands</h3>
        @include('theme.layouts.partials._productBrands')
    </div>

    <hr>

    <div class="colors">
        <h3>Colors</h3>
        <div class="samples__container container--full">
            @include('theme.layouts.partials._productColors')
        </div>
    </div>

</div>
