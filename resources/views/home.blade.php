@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Dashboard') }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<div class="card-styles">
    <div class="card-style-3">
        <div class="card-content">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-users"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Users</h6>
                            <h3 class="text-bold mb-10">{{$user}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-indent-decrease"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Slider</h6>
                            <h3 class="text-bold mb-10">{{$slider}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="lni lni-eye"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Contact</h6>
                            <h3 class="text-bold mb-10">{{$contact}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-pencil-alt"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Study</h6>
                                <h3 class="text-bold mb-10">{{$study}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-thumbs-up"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Team</h6>
                            <h3 class="text-bold mb-10">{{$team}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-slideshare"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Service</h6>
                            <h3 class="text-bold mb-10">{{$service}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>

                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon indigo">
                            <i class="lni lni-gallery"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Gallery</h6>
                                <h3 class="text-bold mb-10">{{$gallery}}</h3>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>
        </div>
    </div>
</div>
@endsection
