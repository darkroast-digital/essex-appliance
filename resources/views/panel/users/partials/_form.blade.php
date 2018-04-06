@if ($mode === 'edit')

    <div class="modal">
        <div class="block column-6">
            <h6>Delete User: <span class="--has-color-font">{{ $user->name }}</span></h6>
            <hr>
            <form action="{{ route('panel.users.destroy', $user->id) }}" method="post">
                @csrf
                @method('delete')
                <p>Hey, looks like you want to delete this user, just make sure this is what you want to do before you follow through.</p>
                <div class="button-group">
                    <button type="submit" class="button-error">Delete User</button>
                    <a href="#0" class="modal-trigger --has-color-font">Cancel, and go back</a>
                </div>
            </form>
        </div>
    </div>

@endif

<form action="{{ $endpoint }}" method="post">
    @csrf

    @if ($mode === 'edit') 
        @method('patch')
    @endif

    <div class="container">

        <div class="column-3">
            <div class="block --has-margin-bottom">
                <image-upload endpoint="{{ route('avatar.store') }}" send-as="image" current-image="{{ $mode === 'create' ? '' : $user->avatarPath() }}"></image-upload>
            </div>

            <!-- /.block -->

        </div>

        <!-- /.column-3 -->

        <div class="column-9">
            <div class="block --has-margin-bottom">
                <div class="title-bar">
                    <h6>{{ $mode === 'create' ? 'Add' : 'Edit' }} User</h6>
                    <div class="button-group">
                        @if ($mode === 'edit')
                            <a href="#0" class="modal-trigger --has-color-error">Delete User</a>
                        @endif
                        <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} User</button>
                    </div>
                </div>

                <!-- /.title-bar -->

                <hr>

                <div class="field">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" placeholder="Add users name..." value="{{ isset($user->name) ? $user->name : '' }}">
                </div>

                <!-- /.field -->

                <div class="field">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Add users email..." value="{{ isset($user->email) ? $user->email : '' }}">
                </div>

                <!-- /.field -->

                <div class="field">
                    <label for="phone">Phone</label>
                    <input type="tel" name="phone" placeholder="Add users phone number..." value="{{ isset($user->phone) ? $user->phone : '' }}">
                </div>

                <!-- /.field -->

            </div>

            <!-- /.block -->

            <div class="block --has-margin-bottom">

                    <div class="field">
                        <label for="password">Password</label>
                        <input type="password" name="password">
                    </div>
    
                    <!-- /.field -->

                <div class="field">
                    <label for="password_confirmation">Password Confirmation</label>
                    <input type="password" name="password_confirmation">
                </div>

                <!-- /.field -->

            </div>

            <!-- /.block -->

            <div class="--has-margin-bottom">
                <button type="submit" class="button-secondary">{{ $mode === 'create' ? 'Save' : 'Update' }} User</button>
            </div>

        </div>

        <!-- /.column-9 -->

    </div>

    <!-- /.container -->

</form>

