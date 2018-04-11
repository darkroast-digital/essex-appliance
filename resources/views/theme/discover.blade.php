@extends('theme.layouts.master')

@section('pageClass', 'discover')
@section('pageTitle', 'Discover')

@section('content')

<section class="discover-wrapper">
    <div class="discover-wrapper__container container">
        <div class="breadcrumbs-wrapper column-12">
            <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
        </div>
        
        <div class="posts-sidebar column-3">
            <div class="posts-sidebar__container container container-full">
                @include('theme.layouts.partials._postsSidebar')
            </div>
        </div>

        <div class="posts-wrapper column-9">
            @foreach ($posts as $post)
                <div class="post">
                    <a href="{{ route('discover.show', $post->slug) }}">
                        <div class="image-wrapper">
                            <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}" draggable="false">
                        </div>
                    </a>
                    <h1><a href="{{ route('discover.show', $post->slug) }}">{{ $post->title }}</a></h1>
                    <p>{{ str_limit($post->content, 150, '...') }}</p>
                    <div class="post-meta">
                        @if ($post->firstTag())
                            <div class="tag">
                                <i class="fas fa-tag"></i>
                                <a href="{{ route('discover') }}?category={{ $post->firstTag() }}">{{ $post->firstTag() }}</a>
                            </div>
                        @endif

                        <div class="view-count">
                            <p>{{ $post->view_count }} View{{ $post->view_count == 1 ? '' : 's' }}</p>
                        </div>
                    </div>
                </div>

                <hr>
            @endforeach

            {{ $posts->links() }}
        </div>
    </div>
</section>

@endsection