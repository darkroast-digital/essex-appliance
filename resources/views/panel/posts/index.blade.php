@extends('panel.layouts.master')

@section('content')

    <div class="modal">
        <div class="block column-6">
            <h6>Delete Post: <span class="--has-color-font modal-name"></span></h6>
            <hr>
            <form action="/panel/posts/" method="post" class="modal-form">
                @csrf
                @method('delete')
                <p>Hey, looks like you want to delete this post, just make sure this is what you want to do before you follow through.</p>
                <div class="button-group">
                    <button type="submit" class="button-error">Delete Post</button>
                    <a href="#0" class="modal-trigger --has-color-font">Cancel, and go back</a>
                </div>
            </form>
        </div>
    </div>

    <div class="container block">
        <div class="column-12 title-bar">
            <h6>Products</h6>
            <div class="button-group">
                {{-- <a href="#0" class="--has-color-font">View Deleted</a> --}}
                <a href="{{ route('panel.posts.create') }}" class="button button-secondary">Add New</a>
            </div>
        </div>
        <hr>
        <table class="table-striped column-12">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Published</th>
                    <th>Added</th>
                </tr>
            </thead>

            <!-- /thead -->

            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>

                        <!-- /td -->

                        <td><a href="{{ route('panel.posts.edit', $post->id) }}" class="table-name">{{ $post->title }}</a></td>

                        <!-- /td -->

                        <td>
                            <span class="label {{ $post->isPublished() ? 'label-success' : 'label-error' }}">
                                {{ $post->isPublished() ? 'Published' : 'Unpublished' }}
                            </span>
                        </td>

                        <!-- td -->

                        <td>{{ $post->created_at->diffForHumans() }}</td>

                        <!-- td -->

                        <td>
                            <a href="{{ route('panel.posts.edit', $post->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon edit">
                                    <g>
                                        <path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"></path>
                                    </g>
                                </svg>
                            </a>

                            <!-- /.edit -->

                            <a href="#0" class="modal-trigger" data-modalid="{{ $post->id}}" data-modalname="{{ $post->title }}">
                                <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon trash">
                                    <g>
                                        <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"></path>
                                    </g>
                                </svg>
                            </a>

                            <!-- /.trash -->

                        </td>

                        <!-- /td -->

                    </tr>

                    <!-- /tr -->

                @endforeach
            </tbody>

            <!-- /tbody -->

        </table>

        <!-- /.table-striped -->
    </div>

    <!-- /.block -->

    <div class="container --has-margin-bottom">
        <div class="column">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
