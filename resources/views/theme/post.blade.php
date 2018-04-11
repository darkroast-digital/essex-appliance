@extends('theme.layouts.master')

@section('pageClass', 'single-post')
@section('pageTitle', $post->title)

@section('content')

<div class="post">
    <div class="post__container container">
        <div class="breadcrumbs-wrapper column-12">
            <breadcrumbs url="{{ app('request')->url() }}"></breadcrumbs>
        </div>

        <div class="posts-sidebar column-3">
            <div class="posts-sidebar__container container container-full">
                @include('theme.layouts.partials._postsSidebar')
            </div>
        </div>

        <div class="post-details column-9">
            <div class="details">
                <div class="image-wrapper">
                    <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}" draggable="false">
                </div>
                <p class="date"><i class="far fa-calendar"></i> {{ $post->created_at->format('F dS, Y') }} / By {{ $post->author() }}</p>
                <h1>{{ $post->title }}</h1>
                
                <div class="post-body">
                    {!! $post->content !!}
                </div>

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

            <div class="share-links">
                <p>Share: </p>
                <a href="http://www.facebook.com/sharer.php?u={{ route('discover.show', $post->slug) }}" target="_blank" title="Share on Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="http://twitter.com/share?text={!! str_replace(' ', '%20', $post->title) !!}&url={{ route('discover.show', $post->slug) }}" target="_blank" title="Tweet this">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://plus.google.com/share?url={{ route('discover.show', $post->slug) }}" target="_blank" title="Share on Google+">
                    <i class="fab fa-google-plus-g"></i>
                </a>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ route('discover.show', $post->slug) }}&title={!! str_replace(' ', '%20', $post->title) !!}&summary={{ str_limit($post->content, 100, '...') }}&source=" target="_blank" title="Share on LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>

            <hr>

            <div class="related-posts">
                <div class="related-posts__container container container-full">
                    @if (count($related) > 0)
                        @foreach ($related as $post)
                            <div class="related column-4">
                                <a href="{{ route('discover.show', $post->slug) }}">
                                    <h4>{{ $post->title }}</h4>
                                    <div class="image-wrapper">
                                        <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}" draggable="false">
                                    </div>
                                </a>
                            </div>
                        @endforeach

                        <hr>
                    @endif
                </div>
            </div>

            <div class="inner-pagination">
                <div class="prev">
                    @if ($prevPost)
                        <a href="{{ route('discover.show', $prevPost->slug) }}"><i class="fas fa-caret-left"></i> PREVIOUS POST: {{ $prevPost->title }}</a>
                    @endif
                </div>
                
                @if ($nextPost)
                    <div class="next">
                        <a href="{{ route('discover.show', $nextPost->slug) }}">NEXT POST: {{ $nextPost->title }} <i class="fas fa-caret-right"></i></a>
                    </div>
                @endif
            </div>


            
                                        
        </div>
        
    </div>
</div>

@endsection