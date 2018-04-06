@if ($mode === 'edit')

<div class="modal">
    <div class="block column-6">
        <h6>Delete Post: <span class="--has-color-font">{{ $post->title }}</span></h6>
        <hr>
        <form action="{{ route('panel.posts.destroy', $post->id) }}" method="post">
            @csrf @method('delete')
            <p>Hey, looks like you want to delete this post, just make sure this is what you want to do before you follow through.</p>
            <div class="button-group">
                <button type="submit" class="button-error">Delete Product</button>
                <a href="#0" class="modal-trigger --has-color-font">Cancel, and go back</a>
            </div>
        </form>
    </div>
</div>

@endif

<form action="{{ $endpoint }}" method="post">
    @csrf @if ($mode === 'edit') @method('patch') @endif

    <div class="container">

        <div class="column-3">

            <div class="block --has-margin-bottom">
                <div class="field">

                    <label for="type">Category</label>
                    <div class="select">
                        <select name="tag">

                            @if ($mode === 'create' || isset($post) && !$post->firstTag()) 
                                <option disabled selected>Choose Category</option>
                            @endif

                            @foreach ($tags as $tag)
                                <option value="{{ $tag->name }}" {{ isset($post) && $post->firstTag() === $tag->name ? 'selected' : '' }}>{{ $tag->name }}</option>
                            @endforeach

                        </select>

                        <span class="select-input"></span>
                        <ul class="select-menu"></ul>
                    </div>

                    <!-- /.select -->

                </div>

                <!-- /.field -->

                <div class="field field-inline --has-no-margin-bottom">
                    <label>Published:</label>
                    <label class="toggle">
                            <input type="checkbox" name="published" {{ isset($post->published_at) && $post->published_at ? 'checked' : '' }}>

                            <span class="toggle-button"></span>
                        </label>
                </div>
            </div>

            <!-- /.block -->

        </div>

        <!-- /.column-3 -->

        <div class="column-9">

            <div class="block --has-margin-bottom">
                <div class="title-bar">
                    <h6>{{ $mode === 'create' ? 'Add' : 'Edit' }} Post</h6>
                    <div class="button-group">
                        @if ($mode === 'edit')
                        <a href="#0" class="modal-trigger --has-color-error">Delete Post</a> @endif
                        <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} Post</button>
                    </div>
                </div>

                <!-- /.title-bar -->

                <hr>

                <image-upload endpoint="{{ route('postImage.store') }}" send-as="image" current-image="{{ $mode === 'create' ? '' : $post->imagePath() }}"></image-upload>
            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">
                <div class="field">
                    <label for="title">Post Title</label>
                    <input type="text" name="title" placeholder="Add post title..." value="{{ isset($post->title) ? $post->title : '' }}">
                </div>

                <!-- /.field -->

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">

                <div class="field --has-no-margin-bottom">
                    <label for="name">Post Content</label>
                    <textarea name="content" id="mde" placeholder="Add post content...">{{ isset($post->content) ? $post->content : '' }}</textarea>
                </div>

                <!-- /.field -->

            </div>

            <!-- /.block -->

            <div class="--has-margin-bottom">
                <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} Post</button>
            </div>

        </div>

        <!-- /.column-9 -->

    </div>

    <!-- /.container -->

</form>
