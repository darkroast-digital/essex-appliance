@extends('panel.layouts.master')

@section('content')

    @include('panel.users.partials._form', [ 'mode' => 'edit', 'endpoint' => route('panel.users.update', $user->id) ])        

@endsection
