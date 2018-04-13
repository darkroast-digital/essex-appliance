@extends('theme.layouts.master')

@section('pageClass', 'single-product')
@section('pageTitle', $product->name)

@section('content')

<div class="breadcrumbs__container container">
    <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
</div>

<div class="product">
    <div class="product__container container">
        <div class="left column-3">
            <div class="images">
                <div class="featured-image image-display">
                    <div class="image-wrapper" data-image="../theme/img/oven-1.jpg">
                        <img src="/theme/img/oven-1.jpg" draggable="false">
                    </div>
                </div>

                <div class="secondary-images container--full">
                    <div class="secondary image-display">
                        <div class="image-wrapper">
                            <img src="/theme/img/oven-2.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary image-display">
                        <div class="image-wrapper">
                            <img src="/theme/img/oven-3.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary image-display">
                        <div class="image-wrapper">
                            <img src="/theme/img/oven-4.jpg" draggable="false">
                        </div>
                    </div>

                    <div class="secondary image-display">
                        <div class="image-wrapper">
                            <img src="/theme/img/oven-5.jpg" draggable="false">
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="ads">
                @foreach ($ads as $ad)
                    <div class="ad">
                        <a href="{{ $ad->link }}" target="_blank">
                            <img src="{{ $ad->imagePath() }}" draggable="false">
                        </a>
                    </div>
                @endforeach
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
                        {!! $product->features !!}
                    </div>

                    <div class="tabs__content" data-tab="2">
                        {!! $product->specifications !!}
                    </div>
                </div>
            </div>
  
        </div>

    </div>
</div>

@endsection