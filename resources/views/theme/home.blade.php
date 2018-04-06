@extends('theme.layouts.master')

@section('pageClass', 'home')

@section('content')

<section class="hero">
    <div class="hero__container container container-block">
        <div class="grid-container">
            <h1>Come in & see the</h1>
            <h2>DIFFERENCE</h2>
            <p>30 years of quality service consectetur adipiscing elit, sed do eiusmod tempor dolor sit consectetur adipiscing elit, sed do eiusmod tempor dolor</p>
        </div>
        <a href="" class="button">Learn More</a>
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
                <a href="" class="button">Learn more about us</a>
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
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/stoves.jpg" draggable="false">
                            <p>Stoves</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/refrigerators.jpg" draggable="false">
                            <p>Refrigerators</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/washers.jpg" draggable="false">
                            <p>Washers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/dryers.jpg" draggable="false">
                            <p>Dryers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/dish-washer.jpg" draggable="false">
                            <p>Dish Washers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/freezers.jpg" draggable="false">
                            <p>Freezers</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/microwaves.jpg" draggable="false">
                            <p>Microwaves</p>
                        </div>
                    </a>
                </div>

                <div class="column-3 product">
                    <a href="">
                        <div class="product-wrapper">
                            <img src="/theme/img/appliances.jpg" draggable="false">
                            <p>Appliances</p>
                        </div>
                    </a>
                </div>

                <a href="" class="button">Find More Products</a>
            </div>
        </div>

        {{-- End Products --}}

        <div class="ads">
            <div class="ads__container container--full">
                <div class="column-4 ad">
                    <a href="" target="_blank">
                        <img src="/theme/img/ad1.jpg" alt="Built to work hard for the long haul. Shop now." draggable="false">
                    </a>
                </div>

                <div class="column-4 ad">
                    <a href="" target="_blank">
                        <img src="/theme/img/ad2.jpg" alt="The largest selection of black stainless steel appliances. KitchenAid. Learn more." draggable="false">
                    </a>
                </div>

                <div class="column-4 ad">
                    <a href="" target="_blank">
                        <img src="/theme/img/ad3.jpg" alt="Amana. Just Right. Priced right. Easy to use. Quality products. Amana brand delivers on value. Shop now. " draggable="false">
                    </a>
                </div>
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
                <div class="hot-buys-slide container--full">
                    <div class="column-7 image-wrapper">
                        <img src="/theme/img/top-buy-slide.jpg" draggable="false">
                    </div>

                    <div class="column-5 content-wrapper">
                        <h4><a href="">Samsung A500 Washer-Dryer Combo</a></h4>
                        <p>4.9cf Traditional Top Load Washer with Precise Fill Option</p>
                        <p>8.0cf Traditional Dryer With Timed or Sensor Dry Options</p>
                        <h4 class="original">Original <span>$1049</span></h4>
                        <h4 class="sale-price">Now Only <span>$849</span></h4>
                    </div>
                </div>

                {{-- End Hot-Buys Slide 1 --}}

                <div class="hot-buys-slide container--full">
                    <div class="column-7 image-wrapper">
                        <img src="/theme/img/top-buy-slide.jpg" draggable="false">
                    </div>

                    <div class="column-5 content-wrapper">
                        <h4><a href="">Samsung A500 Washer-Dryer Combo</a></h4>
                        <p>4.9cf Traditional Top Load Washer with Precise Fill Option</p>
                        <p>8.0cf Traditional Dryer With Timed or Sensor Dry Options</p>
                        <h4 class="original">Original <span>$1049</span></h4>
                        <h4 class="sale-price">Now Only <span>$849</span></h4>
                    </div>
                </div>

                {{-- End Hot-Buys Slide 2 --}}

                <div class="hot-buys-slide container--full">
                    <div class="column-7 image-wrapper">
                        <img src="/theme/img/top-buy-slide.jpg" draggable="false">
                    </div>

                    <div class="column-5 content-wrapper">
                        <h4><a href="">Samsung A500 Washer-Dryer Combo</a></h4>
                        <p>4.9cf Traditional Top Load Washer with Precise Fill Option</p>
                        <p>8.0cf Traditional Dryer With Timed or Sensor Dry Options</p>
                        <h4 class="original">Original <span>$1049</span></h4>
                        <h4 class="sale-price">Now Only <span>$849</span></h4>
                    </div>
                </div>

                {{-- End Hot-Buys Slide 3 --}}
            </div>

            {{-- End Hot-Buys Slider --}}

            <div class="ribbon"></div>
            <a href="" class="ribbon-link"><span>Click Here To Find More</span> Hot Buys & In-Store Sales <i class="fas fa-caret-right"></i></a>
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
            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-1.jpg" draggable="false">
                    </div>

                    <p>KitchenAid&reg; 30-Inch 5 Burner Dual Fuel Double Oven Convection Range</p>
                    <p><strong>$989.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 1 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-2.jpg" draggable="false">
                    </div>

                    <p>Amana&reg; 29-inch Wide Bottom-Freezer Refrigerator with Garden Fresh&trade;</p>
                    <p><strong>$789.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 2 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-3.jpg" draggable="false">
                    </div>

                    <p>Maytag&reg; Top Load Dryer with the PowerDry System and Extra Moisture Sensor</p>
                    <p><strong>$599.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 3 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-4.jpg" draggable="false">
                    </div>

                    <p>Jenn-Air&reg; 72" Counter Depth French Door Refrigeratore</p>
                    <p><strong>$1259.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 4 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-5.jpg" draggable="false">
                    </div>

                    <p>Maytag&reg; 7.0 cu. ft. Dryer with Steam Enhanced Cycles</p>
                    <p><strong>$699.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 5 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-1.jpg" draggable="false">
                    </div>

                    <p>KitchenAid&reg; 30-Inch 5 Burner Dual Fuel Double Oven Convection Range</p>
                    <p><strong>$989.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 1 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-2.jpg" draggable="false">
                    </div>

                    <p>Amana&reg; 29-inch Wide Bottom-Freezer Refrigerator with Garden Fresh&trade;</p>
                    <p><strong>$789.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 2 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-3.jpg" draggable="false">
                    </div>

                    <p>Maytag&reg; Top Load Dryer with the PowerDry System and Extra Moisture Sensor</p>
                    <p><strong>$599.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 3 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-4.jpg" draggable="false">
                    </div>

                    <p>Jenn-Air&reg; 72" Counter Depth French Door Refrigeratore</p>
                    <p><strong>$1259.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 4 --}}

            <div class="new-slide">
                <a href="">
                    <div class="image-wrapper">
                        <img src="/theme/img/product-5.jpg" draggable="false">
                    </div>

                    <p>Maytag&reg; 7.0 cu. ft. Dryer with Steam Enhanced Cycles</p>
                    <p><strong>$699.00</strong></p>
                </a>
            </div>

            {{-- End New Slide 5 --}}





        </div>
    </div>
</section>

{{-- End New --}}

<section class="ad-banner">
    <div class="ad-banner__container container">
        <a href="" target="_blank">
            <img src="/theme/img/ad-banner.jpg" alt="The largest selection of black stainless steel appliances. KitchenAid. Learn More" draggable="false">
        </a>
    </div>
</section>

{{-- End Ad Banner --}}

<section class="latest-posts">
    <div class="latest-posts__container container">
        <h2>Latest Posts</h2>

        <div class="posts container--full">
            <div class="column-4 post">
                <div class="image-wrapper">
                    <img src="/theme/img/post-1.jpg" draggable="false">
                </div>

                <div class="content-wrapper container--full">
                    <div class="date">
                        <p><span>08</span><br/>
                        JAN</p>
                    </div>

                    <div class="details">
                        <p class="category">Lifestyle</p>
                        <h5><a href="">2018 Kitchen Style Guide</a></h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
            </div>

            {{-- End Post 1 --}}

            <div class="column-4 post">
                <div class="image-wrapper">
                    <img src="/theme/img/post-2.jpg" draggable="false">
                </div>

                <div class="content-wrapper container--full">
                    <div class="date">
                        <p><span>06</span><br/>
                        JAN</p>
                    </div>

                    <div class="details">
                        <p class="category">Tips</p>
                        <h5><a href="">Keep your washer running like new</a></h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
            </div>

            {{-- End Post 2 --}}

            <div class="column-4 post">
                <div class="image-wrapper">
                    <img src="/theme/img/post-3.jpg" draggable="false">
                </div>

                <div class="content-wrapper container--full">
                    <div class="date">
                        <p><span>05</span><br/>
                        JAN</p>
                    </div>

                    <div class="details">
                        <p class="category">Products</p>
                        <h5><a href="">REVIEW - Amana&reg; 30-inch Gas Range</a></h5>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text...</p>
                    </div>
                </div>
            </div>

            {{-- End Post 3 --}}

        </div>
    </div>
</section>

{{-- End Posts --}}

@endsection
