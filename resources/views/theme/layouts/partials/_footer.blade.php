<section class="brands">
    <div class="brands__container container">
        <div class="brands-slider">
            <div class="brand-slide">
                <a href="https://www.whirlpool.ca/en_ca.html" target="_blank">
                    <img src="/theme/img/whirlpool.jpg" alt="Whirlpool" draggable="false">
                </a>
            </div>

            {{-- End Brands Slide 1 --}}

            <div class="brand-slide">
                <a href="https://www.maytag.ca/en_ca.html" target="_blank">
                    <img src="/theme/img/maytag.jpg" alt="Maytag" draggable="false">
                </a>
            </div>

            {{-- End Brands Slide 2 --}}

            <div class="brand-slide">
                <a href="http://www.kitchenaid.ca/en_CA/" target="_blank">
                    <img src="/theme/img/kitchenaid.jpg" alt="KitchenAid" draggable="false">
                </a>
            </div>

            {{-- End Brands Slide 3 --}}

            <div class="brand-slide">
                <a href="https://www.jennair.ca" target="_blank">
                    <img src="/theme/img/jenn-air.jpg" alt="Jenn-Air" draggable="false">
                </a>
            </div>

            {{-- End Brands Slide 4 --}}

            <div class="brand-slide">
                <a href="http://amanacanada.ca/" target="_blank">
                    <img src="/theme/img/amana.jpg" alt="Amana" draggable="false">
                </a>
            </div>

            {{-- End Brands Slide 5 --}}

        </div>

        {{-- End Brands Slider --}}
    </div>
</section>

{{-- End Brands --}}

<footer class="footer">
    <div class="banner">
        <div class="banner__container container">
            <div class="image-wrapper column-2">
                <img src="/theme/img/30th-ribbon.png" alt="30th anniversary" draggable="false">
            </div>

            <div class="content-wrapper column-10">
                <h2>Locally Owned & Operated for Over 30 Years</h2>
                <p>Essex Appliance Center is proud to be celebrating its 30th Anniversary in July of 2016 offering the widest selection of home appliances in the area. Locally owned and operated by Gord and Cathy Stevens, Essex Appliance is "flexible in everyone's pocket book," offering both low priced, high volume value brands and competitively priced premium brands.</p>
            </div>
        </div>
    </div>

    {{-- End Footer Banner --}}

    <div class="footer-nav">
        <div class="footer-nav__container container">

            <div class="column contact">
                <div class="image-wrapper">
                    <img src="/theme/img/logo.jpg" alt="Essex Appliance Centre LTD. Sales | Service | Delivery" draggable="false">
                </div>

                <div class="field address">
                    <i class="fas fa-home"></i>
                    <p>76 Talbot St S, Essex, ON, N8M 1A9</p>
                </div>

                <div class="field phone">
                    <i class="fas fa-phone"></i>
                    <p>1.519.776.6316</p>
                </div>

                <div class="field email">
                    <i class="fas fa-envelope"></i>
                    <p>sales@essexappliance.com</p>
                </div>
            </div>

            {{-- End Column Contact --}}

            <div class="column products">
                <h3>Products</h3>
                <a href="{{ @route('products') }}?category=Stoves">Stoves</a>
                <a href="{{ @route('products') }}?category=Refrigerators">Refrigerators</a>
                <a href="{{ @route('products') }}?category=Washers">Washers</a>
                <a href="{{ @route('products') }}?category=Dryers">Dryers</a>
                <a href="{{ @route('products') }}?category=Dish Washers">Dish Washers</a>
                <a href="{{ @route('products') }}?category=Freezers">Freezers</a>
                <a href="{{ @route('products') }}?category=Microwaves">Microwaves</a>
                <a href="{{ @route('products') }}?category=Appliances">Appliances</a>
            </div>

            {{-- End Column Products --}}

            <div class="column brands">
                <h3>Brands</h3>
                <a href="{{ @route('products') }}?brand=Whirlpool">Whirlpool</a>
                <a href="{{ @route('products') }}?brand=Maytag">Maytag</a>
                <a href="{{ @route('products') }}?brand=KitchenAid">KitchenAid</a>
                <a href="{{ @route('products') }}?brand=Jenn-Air">Jenn-Air</a>
                <a href="{{ @route('products') }}?brand=Amana">Amana</a>
            </div>

            {{-- End Column Brands --}}

            <div class="column nav-links">
                <h3>Navigation</h3>
                @include('theme.layouts.partials._navLinks')
            </div>

            {{-- End Column Nav-Links --}}

            <div class="column newsletter">
                <h3>Newsletter</h3>
                <p>Register your email for news</p>

                <form action="" method="post">
                    <input type="text" name="email" placeholder="Your email here" required>
                    <button class="button submit">Subscribe</button>
                </form>

                @include('theme.layouts.partials._socialLinks')
            </div>

            {{-- End Column Newsletter --}}

        </div>
    </div>

    {{-- End Footer Nav --}}

    <div class="copy-bar">
        <div class="copy-bar__container container">
            <p>&copy; 2018 Essex Appliance Centre. All Rights Reserved. Website by <strong>DarkRoast Digital</strong></p>

            <div class="payment-methods">
                <img src="/theme/img/mastercard.jpg" alt="MasterCard" draggable="false">
                <img src="/theme/img/maestro.jpg" alt="Maestro" draggable="false">
                <img src="/theme/img/visa.jpg" alt="Visa" draggable="false">
            </div>
        </div>
    </div>

    {{-- End Copy-Bar --}}
</footer>
