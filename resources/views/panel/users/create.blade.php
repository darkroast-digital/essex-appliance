@extends('panel.layouts.master')

@section('content')

    @include('panel.users.partials._form', [ 'mode' => 'create', 'endpoint' => route('panel.users.store') ])        

@endsection
