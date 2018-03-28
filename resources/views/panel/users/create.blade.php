@extends('panel.layouts.master')

@section('content')

    @include('panel.products.partials._form', [ 'mode' => 'create', 'endpoint' => route('panel.products.store') ])        

@endsection
