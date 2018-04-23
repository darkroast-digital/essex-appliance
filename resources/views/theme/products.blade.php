@extends('theme.layouts.master')

@section('pageClass', 'products')
@section('pageTitle', 'Products')

@section('content')
@include('theme.layouts.partials._productsOffCanvas')

<section class="main">
    <div class="main__container container">
        <div class="hamburger off-canvas-trigger products-nav">
            <button>Sort Products</button>
        </div>
        
        <div class="display-bar column-12">
            <div class="container--full">
                <div class="column-3">
                    <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
                </div>
            
                <div class="column-9">
                    <div class="displays">
                        @include('theme.layouts.partials._productDisplays')
                    </div>

                </div>
            </div>
        </div>

        <div class="sidebar column-3">
            <div class="sidebar__container container--full">
                <h3>Shop By</h3>

                <div class="categories">
                    <h5>Categories</h5>

                    <categories-list api="{{ route('api.categories.index') }}"></categories-list>
                </div>

                <hr>

                <div class="brands">
                    <h5>Brands</h5>

                    <brands-list api="{{ route('api.brands.index') }}"></brands-list>
                </div>

                <hr>

                <div class="colors">
                    <h5>Colors</h5>
                    
                    <colors-list api="{{ route('api.colors.index') }}"></colors-list>
                </div>

            </div>
        </div>

        <div class="products column-9">
            
            <div class="products__container grid">
                <product-list endpoint="{{ route('api.products.index') }}" initial-query="{{ $query }}">
                </product-list>
                <div class="loader">Loading...</div>
            </div>

        </div>

    </div>
</section>

@endsection
