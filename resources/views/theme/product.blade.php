@extends('theme.layouts.master')

@section('pageClass', 'single-product')

@section('content')

<div class="breadcrumbs__container container">
    <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
</div>

<div class="product">
    <div class="product__container container">
        <div class="left column-3">
            <div class="images">
                <div class="featured-image">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-1.jpg" draggable="false">
                    </div>
                </div>

                <div class="secondary-images container--full">
                    <div class="secondary">
                        <div class="image-wrapper">
                            <img src="/theme/img/1.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary">
                        <div class="image-wrapper">
                            <img src="/theme/img/2.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary">
                        <div class="image-wrapper">
                            <img src="/theme/img/3.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary">
                        <div class="image-wrapper">
                            <img src="/theme/img/4.jpg" draggable="false">
                        </div>
                    </div>
                </div>
            </div>

            <div class="ad">
                <a href="" target="_blank">
                    <img src="/theme/img/ad1.jpg" alt="Built to work hard for the long haul. Shop now." draggable="false">
                </a>
            </div>

            <div class="ad">
                <a href="" target="_blank">
                    <img src="/theme/img/ad2.jpg" alt="The largest selection of black stainless steel appliances. KitchenAid. Learn more." draggable="false">
                </a>
            </div>

        </div>

        <div class="right column-9">
            <h1>{{ $product->name }}</h1>
            <p>Availability: {{ $product->available == 1 ? "In Stock" : "Not In Stock" }}</p>

            <hr>

            <h3>Product Overview</h3>
            <p>SKU: {{ $product->sku }}</p>
            <p>UPC: {{ $product->upc }}</p>
            <p>{{ $product->description }}</p>
            <p>Available Finishes/Colors:</p>
            <div class="colors__container container--full">
                <div class="color"></div>
                <div class="color"></div>
            </div>

            <hr>

            <div class="tabs">
                <ul class="tabs__nav">
                    <li data-tab="1" class="is--active">Features</li>
                    <li data-tab="2">Specifications & Dimensions</li>
                </ul>

                <div class="tabs__body">
                    <div class="tabs__content is--active" data-tab="1">
                        {{ $product->features }}
                    </div>

                    <div class="tabs__content" data-tab="2">
                        {{ $product->specifications }}
                    </div>
                </div>
            </div>
  
        </div>

    </div>
</div>

@endsection