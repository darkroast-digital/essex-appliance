@extends('theme.layouts.master')

@section('pageClass', 'error')
@section('pageTitle', 'Page Not Found')

@section('content')

<section class="not-found">
    <div class="not-found__container container">
        <h1>Page Not Found</h1>

        <p>Sorry, but we couldn't seem to find that page. Please check your url or <a href="{{ route('home') }}">click here</a> to be redirected to the home page.</p>
    </div>
</section>

@endsection