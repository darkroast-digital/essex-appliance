@extends('panel.layouts.master')

@section('content')

    @include('panel.posts.partials._form', [ 'mode' => 'edit', 'endpoint' => route('panel.posts.update', $post->id) ])        

@endsection
