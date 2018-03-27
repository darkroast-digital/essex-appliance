@extends('panel.layouts.master')

@section('content')

    <div class="container block --has-margin-bottom">
        <div class="column-12"><h6>Products</h6></div>
        <hr>

        <table class="table-striped column-12">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>UPC</th>
                    <th>Availability</th>
                </tr>
            </thead>

            <!-- /thead -->
            
            <tbody>

                @foreach ($products as $product)
                
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('panel.products.edit', $product->id) }}">{{ $product->name }}</a></td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->upc }}</td>
                        <td>
                            <span class="label {{ $product->available ? 'label-success' : 'label-error' }}">
                                {{ $product->available ? 'Available' : 'Unavailable' }}
                            </span>
                        </td>
                    </tr>

                @endforeach

            </tbody>

            <!-- /tbody -->

        </table>

        <!-- /.table -->

        <div class="column-12">
            {{ $products->links() }}
        </div>

    </div>

@endsection
