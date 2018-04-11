@if ($mode === 'edit')

    <div class="modal">
        <div class="block column-6">
            <h6>Delete Product: <span class="--has-color-font">{{ $product->name }}</span></h6>
            <hr>
            <form action="{{ route('panel.products.destroy', $product->id) }}" method="post">
                @csrf
                @method('delete')
                <p>Hey, looks like you want to delete this product, just make sure this is what you want to do before you follow through.</p>
                <div class="button-group">
                    <button type="submit" class="button-error">Delete Product</button>
                    <a href="#0" class="modal-trigger --has-color-font">Cancel, and go back</a>
                </div>
            </form>
        </div>
    </div>

@endif

<form action="{{ $endpoint }}" method="post">
    @csrf

    @if ($mode === 'edit') 
        @method('patch')
    @endif

    <input type="hidden" name="_hash" value="{{ isset($hash) ? $hash : $product->hash }}">

    <div class="container">

        <div class="column-3">

            <div class="block --has-margin-bottom">
                <label>Product Variations</label>
                <div class="divider"></div>
                <variations-list></variations-list>

                <!-- /.variation-list -->

                <div class="divider"></div>
                <button>Add Variation</button>
            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                <div class="field">

                    <label for="category">Appliance Type</label>
                    <div class="select">
                        <select name="category">
                            @if ($mode === 'create' || isset($product) && !$product->category()) 
                                <option disabled selected>Choose Category</option>
                            @endif

                            @foreach ($categories as $category)
                                <option value="{{ $category->name }}" {{ isset($product) && $product->category() === $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <span class="select-input"></span>
                        <ul class="select-menu"></ul>
                    </div>

                    <!-- /.select -->

                </div>

                <!-- /.field -->
                
                <div class="field">

                        <label for="brand">Appliance Brand</label>
                        <div class="select">
                            <select name="brand">
                                @if ($mode === 'create' || isset($product) && !$product->brand()) 
                                    <option disabled selected>Choose Brand</option>
                                @endif
    
                                @foreach ($brands as $brand)
                                    <option value="{{ $brand->name }}" {{ isset($product) && $product->brand() === $brand->name ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
    
                            <span class="select-input"></span>
                            <ul class="select-menu"></ul>
                        </div>
    
                        <!-- /.select -->
    
                    </div>
    
                    <!-- /.field -->

                    <div class="field field-inline --has-no-margin-bottom">
                        <label>Available:</label>
                        <label class="toggle">
                            <input type="checkbox" name="available" {{ isset($product->available) && $product->available ? 'checked' : '' }}>

                            <span class="toggle-button"></span>
                        </label>
                    </div>

                    <!-- /.field -->

                    <div class="field field-inline --has-no-margin-bottom">
                        <label>Featured:</label>
                        <label class="toggle">
                            <input type="checkbox" name="available" {{ isset($product->available) && $product->available ? 'checked' : '' }}>

                            <span class="toggle-button"></span>
                        </label>
                    </div>

                    <!-- /.featured -->
            </div>

            <!-- /.block -->
            
            <div class="block --has-margin-bottom">
                <label>Choose Appliance Colour</label>
                <color-select product-id="{{ isset($product->id) ? $product->id : '' }}"></color-select>
            </div>

            <!-- /.block -->

        </div>

        <!-- /.column-3 -->

        <div class="column-9">
            <div class="block --has-margin-bottom">
                <div class="title-bar">
                    <h6>{{ $mode === 'create' ? 'Add' : 'Edit' }} Product</h6>
                    <div class="button-group">
                        @if ($mode === 'edit')
                            <a href="#0" class="modal-trigger --has-color-error">Delete Product</a>
                        @endif
                        <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} Product</button>
                    </div>
                </div>

                <!-- /.title-bar -->

                <hr>
                <div class="field">
                    <label for="name">Product Name</label>
                    <input type="text" name="name" placeholder="Add product name..." value="{{ isset($product->name) ? $product->name : '' }}">
                </div>

                <!-- /.field -->

                <div class="form-row">
                    <div class="field --has-no-margin-bottom">
                        <label for="sku">Product SKU</label>
                        <input type="text" name="sku" placeholder="Add product SKU..." value="{{ isset($product->sku) ? $product->sku : '' }}">
                    </div>

                    <!-- /.field -->

                    <div class="field --has-no-margin-bottom">
                        <label for="upc">Product UPC</label>
                        <input type="text" name="upc" placeholder="Add product UPC..." value="{{ isset($product->upc) ? $product->upc : '' }}">
                    </div>

                    <!-- /.field -->
                </div>

                <!-- /.form-row -->

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">

                <div class="field --has-no-margin-bottom">
                    <label for="description">Product Description</label>
                    <textarea name="description" placeholder="Add product description...">{{ isset($product->description) ? $product->description : '' }}</textarea>
                </div>

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">

                <div class="tabs">
                    <ul class="tabs-nav">
                        <li class="tabs-nav-active" data-tab="features"><label>Product Features</label></li>
                        <li data-tab="specifications"><label>Product Specifications</label></li>
                    </ul>

                    <!-- /.tabs-nav -->

                    <div class="tabs-body">

                        <div class="tabs-content tabs-content-active" data-tab="features">
                            <textarea name="features" placeholder="Add product features...">{{ isset($product->features) ? $product->features : '' }}</textarea>
                        </div>

                        <!-- /.tabs-content -->

                        <div class="tabs-content" data-tab="specifications">
                                <textarea name="features" placeholder="Add product specifications...">{{ isset($product->specifications) ? $product->specifications : '' }}</textarea>
                        </div>

                        <!-- /.tabs-content -->

                    </div>

                    <!-- /.tabs-body -->

                </div>

                <!-- /.tabs -->

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                <multi-image-upload endpoint="{{ route('productImage.store') }}" product-id="{{ isset($product->id) ? $product->id : '' }}"></multi-image-upload>
            </div>

            <!-- /.block -->
            
            <div class="--has-margin-bottom">
                <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} Product</button>
            </div>

        </div>

        <!-- /.column-9 -->

    </div>

    <!-- /.container -->

</form>

