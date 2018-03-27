@extends('panel.layouts.master')

@section('content')

    <div class="container block --has-margin-bottom">
        <div class="column-12 title-bar">
            <h6>Products</h6>
            <div class="button-group">
                <a href="#0" class="--has-color-font">View Deleted</a>
                <a href="{{ route('panel.products.create') }}" class="button button-secondary">Add New</a>
            </div>
        </div>
        <hr>

        <table class="table-striped column-12">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SKU</th>
                    <th>UPC</th>
                    <th>Availability</th>
                    <th></th>
                </tr>
            </thead>

            <!-- /thead -->
            
            <tbody>

                @foreach ($products as $product)
                
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>
                            <a href="{{ route('panel.products.edit', $product->id) }}" class="tooltip-top table-name" data-tooltip="{{ $product->name }}">
                                {{ \Illuminate\Support\Str::words($product->name, 8) }}
                            </a>
                        </td>
                        <td>{{ $product->sku }}</td>
                        <td>{{ $product->upc }}</td>
                        <td>
                            <span class="label {{ $product->available ? 'label-success' : 'label-error' }}">
                                {{ $product->available ? 'Available' : 'Unavailable' }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('panel.products.edit', $product->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon edit">
                                    <g>
                                        <path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"></path>
                                    </g>
                                </svg>
                            </a>

                            <!-- /.edit -->

                            <a href="#0">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon trash">
                                    <g>
                                        <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"></path>
                                    </g>
                                </svg>
                            </a>

                            <!-- /.trash -->

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
