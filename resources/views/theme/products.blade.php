@extends('theme.layouts.master')

@section('pageClass', 'products')

@section('content')

<section class="main">
    <div class="main__container container">
        
        <div class="display-bar column-12">
            <div class="container--full">
                <div class="column-3">
                    <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
                </div>
            
                <div class="column-9">
                    <div class="displays">
                        <div class="display-layout">
                            <button class="grid-display"><i class="fas fa-th"></i></button>
                            <button class="list-display"><i class="fas fa-list"></i></button>
                        </div>

                        <div class="sorting">
                            <div class="sort-by">
                                <p>Sort By</p>
                                <select name="sort-vars">
                                    <option value="new" selected>Newness</option>
                                    <option value="az">A-Z</option>
                                    <option value="za">Z-A</option>
                                </select>
                            </div>

                            <div class="show">
                                <p>Show</p>
                                <select name="show-vars">
                                    <option value="6">6</option>
                                    <option value="9" selected>9</option>
                                    <option value="12">12</option>
                                    <option value="15">15</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="sidebar column-3">
            <div class="sidebar__container container--full">
                <h3>Shop By</h3>

                <div class="categories">
                    <h5>Categories</h5>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="stoves">
                            <span class="checkbox-button"></span>
                            Stoves
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="refrigerators">
                            <span class="checkbox-button"></span>
                            Refrigerators
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="washers">
                            <span class="checkbox-button"></span>
                            Washers
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="dryers">
                            <span class="checkbox-button"></span>
                            Dryers
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="dishwashers">
                            <span class="checkbox-button"></span>
                            Dish Washers
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="freezers">
                            <span class="checkbox-button"></span>
                            Freezers
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="microwaves">
                            <span class="checkbox-button"></span>
                            Microwaves
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="cat">
                        <label class="checkbox">
                            <input type="checkbox" name="other">
                            <span class="checkbox-button"></span>
                            Other
                        </label>
                        <div class="count">(12)</div>
                    </div>
                </div>

                <hr>

                <div class="brands">
                    <h5>Brands</h5>

                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="whirlpool">
                            <span class="checkbox-button"></span>
                            Whirlpool
                        </label>
                        <div class="count">(12)</div>
                    </div>
                    
                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="maytag">
                            <span class="checkbox-button"></span>
                            Maytag
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="kitchenaid">
                            <span class="checkbox-button"></span>
                            KitchenAid
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="jennair">
                            <span class="checkbox-button"></span>
                            Jenn-Air
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="amana">
                            <span class="checkbox-button"></span>
                            Amana
                        </label>
                        <div class="count">(12)</div>
                    </div>

                    <div class="brand">
                        <label class="checkbox">
                            <input type="checkbox" name="other">
                            <span class="checkbox-button"></span>
                            Other
                        </label>
                        <div class="count">(12)</div>
                    </div>
                </div>

                <hr>

                <div class="colors">
                    <h5>Colors</h5>
                    
                    <div class="samples__container container--full">
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                        <div class="color"></div>
                    </div>
                </div>

            </div>
        </div>

        <div class="products column-9">
            
            <div class="products__container">
                <product-list endpoint="{{ route('api.products.index') }}"></product-list>
            </div>

        </div>

    </div>
</section>

@endsection
