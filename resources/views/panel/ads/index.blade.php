@extends('panel.layouts.master')

@section('content')

<form action="{{ route('panel.ads.update') }}" method="post">
        @csrf
        @method('patch')

    <div class="container">

            <div class="column-12">

                <div class="block --has-margin-bottom">
                    <div class="title-bar">
                        <h6>Manage Ads</h6>
                        <div class="button-group">
                            <button type="submit" class="button-secondary">Save Ads</button>
                        </div>
                    </div>

                    <!-- /.title-bar -->

                    <hr>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Exercitationem voluptas, ut deserunt ullam similique, veniam dicta natus voluptate adipisci praesentium aperiam distinctio quo quos sed soluta aut. Nesciunt, reiciendis quod.</p>

                </div>

            </div>

            <!-- /.column-12 -->

            <div class="column-12 --has-margin-bottom">
                <div class="block">
                    <label>Banner</label>
                    <hr>
                    <ad-upload endpoint="{{ route('adImage.store') }}" ad-name="banner" send-as="image" current-image="{{ $banner->image_id ? $banner->imagePath() : '' }}"></image-upload>
                </div>

                <!-- /.block -->

            </div>
            <!-- /.column-12 -->

            <div class="column-4 --has-margin-bottom">
                <div class="block">
                    <label>CTA One</label>
                    <hr>
                    <ad-upload endpoint="{{ route('adImage.store') }}" ad-name="cta_one" send-as="image" current-image="{{ $cta_one->image_id ? $cta_one->imagePath() : '' }}"></image-upload>
                </div>

                <!-- /.block -->
            </div>

            <!-- /.column-3 -->

            <div class="column-4 --has-margin-bottom">
                <div class="block">
                    <label>CTA Two</label>
                    <hr>
                    <ad-upload endpoint="{{ route('adImage.store') }}" ad-name="cta_two" send-as="image" current-image="{{ $cta_two->image_id ? $cta_two->imagePath() : '' }}"></image-upload>
                </div>

                <!-- /.block -->
            </div>

            <!-- /.column-3 -->

            <div class="column-4 --has-margin-bottom">
                <div class="block">
                    <label>CTA Three</label>
                    <hr>
                    <ad-upload endpoint="{{ route('adImage.store') }}" ad-name="cta_three" send-as="image" current-image="{{ $cta_three->image_id ? $cta_three->imagePath() : '' }}"></image-upload>
                </div>

                <!-- /.block -->
            </div>

            <!-- /.column-3 -->

            <div class="column-12 --has-margin-bottom">
                <button type="submit" class="button-secondary">Save Ads</button>
            </div>

            <!-- /.column-12 -->

    </div>

</form>

<!-- /form -->

@endsection
