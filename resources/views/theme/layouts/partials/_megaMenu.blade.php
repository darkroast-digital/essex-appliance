<div class="mega-menu container {{ app('request')->url() == route('home') ? 'full' : '' }}">
    <div class="column-3 products">
        <h3>Products</h3>
        <a href="{{ @route('products') }}?category=Stoves">Stoves</a>
        <a href="{{ @route('products') }}?category=Refrigerators">Refrigerators</a>
        <a href="{{ @route('products') }}?category=Washers">Washers</a>
        <a href="{{ @route('products') }}?category=Dryers">Dryers</a>
        <a href="{{ @route('products') }}?category=Dish Washers">Dish Washers</a>
        <a href="{{ @route('products') }}?category=Freezers">Freezers</a>
        <a href="{{ @route('products') }}?category=Microwaves">Microwaves</a>
        <a href="{{ @route('products') }}?category=Appliances">Appliances</a>
        <a href="{{ @route('products') }}?category=Other">Other</a>
    </div>

    <div class="column-3 brands">
        <h3>Brands</h3>
        <a href="{{ @route('products') }}?brand=Whirlpool">Whirlpool</a>
        <a href="{{ @route('products') }}?brand=Maytag">Maytag</a>
        <a href="{{ @route('products') }}?brand=KitchenAid">KitchenAid</a>
        <a href="{{ @route('products') }}?brand=Jenn-Air">Jenn-Air</a>
        <a href="{{ @route('products') }}?brand=Amana">Amana</a>
        <a href="{{ @route('products') }}?brand=Other">Other</a>
    </div>

    <div class="column-6 ad">
        <div class="image-wrapper">
            <a href="{{ $menuAd->link }}" target="_blank">
                <img src="{{ $menuAd->imagePath() }}" draggable="false">
            </a>
        </div>
    </div>
</div>