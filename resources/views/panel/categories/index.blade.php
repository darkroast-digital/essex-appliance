@extends('panel.layouts.master') 
@section('content')

<div class="modal">
    <div class="block column-6">
        <h6 class="--has-color-error">Are You Sure You Want To Do This?</h6>
        <p>You are going to delete a category, this is a permanent action.</p>
        <form action="{{ route('panel.categories.delete', $type) }}" method="post" class="delete-form">
            @csrf @method('delete')

            <input type="hidden" name="delete" value="">

            <button class="button-error">Delete Category</button>
        </form>
    </div>
</div>
<div class="overlay"><span class="overlay-close">&times;</span></div>

<div class="container">

    <div class="column-4">
        <div class="block">
            <form action="{{ route('panel.categories', $type) }}" method="post">
                @csrf

                <div class="field">
                    <label for="name">Add New Category</label>
                    <input type="text" name="name">
                </div>
                <button type="submit">Add Category</button>
            </form>
        </div>
    </div>

    <!-- /.column-4 -->

    <div class="column-8 block">
        <table class="table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Count</th>
                <th></th>
            </thead>

            <!-- /thead -->

            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>

                    <!-- /td -->

                    <td>{{ $tag->name }}</td>

                    <!-- /td -->

                    <td>{{ $tag->count }}</td>

                    <!-- /td -->

                    <td>
                        <a href="#0" class="trash trash-trigger modal-trigger" data-delete="{{ $tag->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" viewBox="0 0 20 20" width="20" height="20" class="icon table-icon trash">
                                <g>
                                    <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"></path>
                                </g>
                            </svg>
                        </a>
                    </td>

                    <!-- td -->

                </tr>

                <!-- /tr -->

                @endforeach
            </tbody>

            <!-- tbody -->

        </table>

        <!-- /table -->

    </div>

    <!-- /.column-8 -->

</div>

<!-- /.container -->

@endsection
