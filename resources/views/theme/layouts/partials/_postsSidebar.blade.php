<div class="categories">
    <h3>All Categories</h3>

    <ul class="category-list">
        @foreach ($tags as $tag)
            <li>
                <a href="{{ route('discover') }}?category={{ $tag->name }}">{{ $tag->name }}</a>
                <p>({{ $tag->count }})</p>
            </li>
        @endforeach
    </ul>
</div>

<div class="popular">
    <h3>Popular Posts</h3>

    @foreach ($popular as $post)
        <div class="popular-post container container-full">
            <div class="column-5">
                <div class="image-wrapper">
                    <img src="{{ $post->imagePath() }}" alt="{{ $post->title }}" draggable="false">
                </div>
            </div>

            <div class="column-7">
                <h5><a href="{{ route('discover.show', $post->slug) }}">{{ $post->title }}</a></h5>
                <p>{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach
</div>