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
                <h6>{{ $mode === 'create' ? 'Add' : 'Edit' }} Product</h6>
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

        </div>

        <!-- /.column-9 -->

    </div>

    <!-- /.container -->

</form>

