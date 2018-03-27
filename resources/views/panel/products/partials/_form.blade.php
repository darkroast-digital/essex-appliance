<form action="{{ $endpoint }}" method="post">
    @csrf

    @if ($mode === 'edit') 
        @method('patch')
    @endif

    <div class="container">

        <div class="column-3">
            <div class="block --has-margin-bottom">
                <image-upload></image-upload>
            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                <div class="field">

                    <label for="type">Appliance Type</label>
                    <div class="select">
                        <select name="type">
                            <option disabled selected>Choose Type</option>
                            <option value="one">One</option>
                            <option value="one">One</option>
                            <option value="one">One</option>
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
                                <option disabled selected>Choose Brand</option>
                                <option value="one">One</option>
                                <option value="one">One</option>
                                <option value="one">One</option>
                            </select>
    
                            <span class="select-input"></span>
                            <ul class="select-menu"></ul>
                        </div>
    
                        <!-- /.select -->
    
                    </div>
    
                    <!-- /.field -->

                    <div class="field field-inline">
                        <label>Available:</label>
                        <label class="toggle">
                            <input type="checkbox" name="featured" {{ isset($product->available) && $product->available ? 'checked' : '' }}>

                            <span class="toggle-button"></span>
                        </label>
                    </div>
            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                colours
            </div>

            <!-- /.block -->

        </div>

        <!-- /.column-3 -->

        <div class="column-9">
            <div class="block --has-margin-bottom">
                <div class="title-bar">
                    <h6>{{ $mode === 'create' ? 'Add' : 'Edit' }} Product</h6>
                    <div class="button-group">
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
                    <div class="field">
                        <label for="sku">Product SKU</label>
                        <input type="text" name="sku" placeholder="Add product SKU..." value="{{ isset($product->sku) ? $product->sku : '' }}">
                    </div>

                    <!-- /.field -->

                    <div class="field">
                        <label for="upc">Product UPC</label>
                        <input type="text" name="upc" placeholder="Add product UPC..." value="{{ isset($product->upc) ? $product->upc : '' }}">
                    </div>

                    <!-- /.field -->
                </div>

                <!-- /.form-row -->

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">

                <div class="field">
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
            
            <div class="--has-margin-bottom">
                <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} Product</button>
            </div>

        </div>

        <!-- /.column-9 -->

    </div>

    <!-- /.container -->

</form>

