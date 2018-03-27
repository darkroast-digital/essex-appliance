@extends('panel.layouts.master')

@section('content')

    @include('panel.products.partials._form', [ 'mode' => 'edit', 'endpoint' => route('panel.products.update', $product->id) ])        

@endsection
