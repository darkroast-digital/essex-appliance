<form action="{{ $endpoint }}" method="post">

    <div class="container">

        <div class="column-3">
            <div class="block --has-margin-bottom">
                Image
            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                tags <br>
                featured
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

