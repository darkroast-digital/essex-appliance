@extends('theme.layouts.master')

@section('pageClass', 'home')
@section('pageTitle', 'Home')

@section('content')

<section class="hero">
    <div class="hero__container container container-block">
        <div class="grid-container">
            <h1>Come in & see the</h1>
            <h2>DIFFERENCE</h2>
            <p>30 years of quality service consectetur adipiscing elit, sed do eiusmod tempor dolor sit consectetur adipiscing elit, sed do eiusmod tempor dolor</p>
        </div>
        <a href="{{ route('services') }}" class="button">Learn More</a>
    </div>
</section>

{{-- End Hero --}}

<section class="main">
    <div class="main__container container">

        <div class="cta">
            <div class="cta-wrapper">
                <h3>Worth the drive to</h3>
                <h3><span>Beautiful Downtown Essex</span></h3>
                <p>Essex Appliance Center is the premier place for all of your appliance needs in Southwest Ontario.</p>
                <p>With over 12,000 square feet of showroom space, and 15,000 square feet of warehouse, we have a wide selection of appliances for you to research and compare.</p>
                <a href="{{ route('services') }}" class="button">Learn more about us</a>
            </div>
        </div>

        {{-- End CTA --}}

        <div class="services">
            <div class="services__container container">
                <div class="column-3 service">
                    <img src="/theme/img/selection-icon.png" draggable="false">
                    <p>Large selection at every price level</p>
                </div>

                <div class="column-3 service">
                    <img src="/theme/img/delivery-icon.png" draggable="false">
                    <p>Free delivery to your home</p>
                </div>

                <div class="column-3 service">
                    <img src="/theme/img/parts-icon.png" draggable="false">
                    <p>Appliance parts & services</p>
                </div>

                <div class="column-3 service">
                    <img src="/theme/img/staff-icon.png" draggable="false">
                    <p>Professional, courteous staff</p>
                </div>
            </div>
        </div>

        {{-- End Services --}}

        <div class="products">
            <div class="products__container container--full">
                <div class="column-12">
                    <h2>What Can We Help You Find?</h2>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Stoves">
                        <div class="product-wrapper">
                            <img src="/theme/img/stoves.jpg" draggable="false">
                            <p>Stoves</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Refrigerators">
                        <div class="product-wrapper">
                            <img src="/theme/img/refrigerators.jpg" draggable="false">
                            <p>Refrigerators</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Washers">
                        <div class="product-wrapper">
                            <img src="/theme/img/washers.jpg" draggable="false">
                            <p>Washers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Dryers">
                        <div class="product-wrapper">
                            <img src="/theme/img/dryers.jpg" draggable="false">
                            <p>Dryers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Dish Washers">
                        <div class="product-wrapper">
                            <img src="/theme/img/dish-washer.jpg" draggable="false">
                            <p>Dish Washers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Freezers">
                        <div class="product-wrapper">
                            <img src="/theme/img/freezers.jpg" draggable="false">
                            <p>Freezers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Microwaves">
                        <div class="product-wrapper">
                            <img src="/theme/img/microwaves.jpg" draggable="false">
                            <p>Microwaves</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="{{ route('products') }}?category=Appliances">
                        <div class="product-wrapper">
                            <img src="/theme/img/appliances.jpg" draggable="false">
                            <p>Appliances</p>
                        </div>
                    </a>
                </div>

                <a href="{{ route('products') }}" class="button">Find More Products</a>
            </div>
        </div>

        {{-- End Products --}}

        <div class="ads">
            <div class="ads__container container--full">
                @foreach ($ads as $ad)
                    @if ($ad->name != 'banner' && $ad->name != 'menu')
                        <div class="column-4 ad">
                            <a href="{{ $ad->link }}" target="_blank">
                                <img src="{{ $ad->imagePath() }}" draggable="false">
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        {{-- End Ads --}}

    </div>
</section>

{{-- End Main --}}

<section class="hot-buys">
    <div class="hot-buys__container container">
        <div class="column-7 sales">
            <h3><span>Hot Buys</span> & In-Store Sales</h3>

            <div class="hot-buys-slider container--full">

                @foreach ($hotBuys as $product)
                    <div class="hot-buys-slide container--full">
                        <div class="column-7 image-wrapper">
                            <img src="/theme/img/top-buy-slide.jpg" draggable="false">
                        </div>

                        <div class="column-5 content-wrapper">
                            <h4><a href="#">{{ $product->name }}</a></h4>
                            <p>{{ str_limit($product->description, 115, '...') }}</p>
                            <h4 class="sale-price">Now Only <span>${{ $product->price }}</span></h4>
                        </div>
                    </div>
                @endforeach

                {{-- <div class="hot-buys-slide container--full">
                    <div class="column-7 image-wrapper">
                        <img src="/theme/img/top-buy-slide.jpg" draggable="false">
                    </div>

                    <div class="column-5 content-wrapper">
                        <h4><a href="">Samsung A500 Washer-Dryer Combo</a></h4>
                        <p>4.9cf Traditional Top Load Washer with Precise Fill Option</p>
                        <p>8.0cf Traditional Dryer With Timed or Sensor Dry Options</p>
                        <h4 class="sale-price">Now Only <span>$849</span></h4>
                    </div>
                </div> --}}

            </div>

            {{-- End Hot-Buys Slider --}}

            <div class="ribbon"></div>
            <a href="{{ @route('products') }}?featured=1" class="ribbon-link"><span>Click Here To Find More</span> Hot Buys & In-Store Sales <i class="fas fa-caret-right"></i></a>
        </div>
    </div>
</section>

{{-- End Hot-Buys --}}

<section class="new">
    <div class="new__container container">
        <div class="column-12">
            <h2>What's New</h2>
        </div>

        <div class="new-slider container--full">

            @foreach ($products as $product)
                <div class="new-slide">
                    <a href="{{ @route('products.show', $product->name) }}">
                        <div class="image-wrapper">
                            <img src="/theme/img/product-1.jpg" draggable="false">
                        </div>

                        <p>{{ $product->name }}</p>
                        @if ($product->price != null)
                            <p><strong>${{ $product->price }}</strong></p>
                        @endif
                    </a>
                </div>
            @endforeach

            {{-- <div class="new-slide">
                <a href="#">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-1.jpg" draggable="false">
                    </div>

                    <p>KitchenAid&reg; 30-Inch 5 Burner Dual Fuel Double Oven Convection Range</p>
                    <p><strong>$989.00</strong></p>
                </a>
            </div> --}}

        </div>
    </div>
</section>

{{-- End New --}}

<section class="ad-banner">
    <div class="ad-banner__container container">
        <a href="{{ $banner->link }}" target="_blank">
            <img src="{{ $banner->imagePath() }}" draggable="false">
        </a>
    </div>
</section>

{{-- End Ad Banner --}}

<section class="latest-posts">
    <div class="latest-posts__container container">
        <h2>Latest Posts</h2>

        <div class="posts container--full">

            @foreach ($posts as $post)
                <div class="column-4 post">
                    <div class="image-wrapper">
                        <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}" draggable="false">
                    </div>

                    <div class="content-wrapper container--full">
                        <div class="date">
                            <p><span>{{ $post->created_at->format('d') }}</span><br/>
                            {{ $post->created_at->format('M') }}</p>
                        </div>

                        <div class="details">
                            <p class="category">{{ $post->firstTag() }}</p>
                            <h5><a href="{{ route('discover.show', $post->slug) }}">{{ $post->title }}</a></h5>
                            <p>{{ str_limit($post->content, 150, '...') }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

{{-- End Posts --}}

@endsection
