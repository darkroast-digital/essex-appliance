@extends('panel.layouts.master')

@section('content')
     
    @include('panel.posts.partials._form', [ 'mode' => 'create', 'endpoint' => route('panel.posts.store') ])        

@endsection
