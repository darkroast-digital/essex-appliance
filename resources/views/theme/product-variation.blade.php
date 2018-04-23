@extends('theme.layouts.master')

@section('pageClass', 'single-product')
@section('pageTitle', $original->name)

@section('content')

<div class="breadcrumbs__container container">
    <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
</div>

<div class="product">
    <div class="product__container container">
        <div class="left column-3">
            <div class="images">
                
                @if ($featured)
                    <div class="featured-image image-display">
                        <div class="image-wrapper" data-image="{{ $featured }}">
                            <img src="{{ $featured }}" draggable="false">
                        </div>
                    </div>

                    <div class="secondary-images container--full">
                        @foreach ($secondary as $image)
                            <div class="secondary image-display">
                                <div class="image-wrapper">
                                    <img src="{{ $image }}" draggable="false">
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
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
            <h1>{{ $original->name }}</h1>

            @if ($original->price)
                <h2>${{ $original->price }}</h2>
            @endif

            <p>Availability: {{ $product->available == 1 ? "In Stock" : "Not In Stock" }}</p>

            <hr>

            <h3>Product Overview</h3>
            <p>SKU: {{ $product->sku }}</p>
            <p>UPC: {{ $original->upc }}</p>
            <p>{{ $original->description }}</p>
            <p>Available Finishes/Colors:</p>
            <div class="colors__container container--full">
                @if ($original->colorsObject())
                    @foreach ($original->colorsObject() as $color)
                        @php
                            $i = $loop->index;
                        @endphp
                        @foreach ($original->colorHex() as $hex)
                            @if ($loop->index == $i)
                                <a href="{{ route('products') }}/{{ $original->name }}">
                                    <div class="color" style="background:{{ $hex }}" title="{{ $color->name }}"></div>
                                </a>
                            @endif
                        @endforeach
                    @endforeach
                
                @if ($variations)
                    @foreach ($variations as $var) 
                        @if (count($var->colorsObject()) > 0) 
                            @foreach ($var->colorsObject() as $color)
                                <a href="{{ route('products') }}/{{ $original->name }}?sku={{$var->sku}}">
                                    <div class="color" style="background:{{ $var->colorHex() }}" title="{{ $color->name }}"></div>
                                </a>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </div>

            <hr>

            <div class="tabs">
                <ul class="tabs__nav">
                    <li data-tab="1" class="is--active">Features</li>
                    <li data-tab="2">Specifications & Dimensions</li>
                </ul>

                <div class="tabs__body">
                    <div class="tabs__content is--active" data-tab="1">
                        {!! nl2br(e($original->features)) !!}
                    </div>

                    <div class="tabs__content" data-tab="2">
                        {!! nl2br(e($original->specifications)) !!}
                    </div>
                </div>
            </div>
  
        </div>

    </div>
</div>

@endsection