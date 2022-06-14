@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Make Gallery') }}</h2>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
</div>
<!-- ========== title-wrapper end ========== -->

<div class="card-styles">
    <div class="card-style-3 mb-30">
        <div class="card-content">

            @if ($message = Session::get('success'))
            <div class="alert-box success-alert">
                <div class="alert">
                    <h4 class="alert-heading">Success</h4>
                    <p class="text-medium">
                        {{ $message }}
                    </p>
                </div>
            </div>
            @endif

            <form action="{{ route('gallery.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">{{ __('Title') }}</label>
                            <input type="text" @error('title') class="form-control is-invalid" @enderror name="title"
                                id="title" placeholder="{{ __('Title') }}" value="{{ old('title')}}" >
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-md-6">
                        <div class="select-style-1">
                            <label>Type</label>
                            <div class="select-position">
                                <select class="status" name="type" id="type">
                                    <option value=''>Select Type</option>
                                    <option value="0">Image</option>
                                    <option value="1">Video</option>
                                </select>
                            </div>
                            @error('type')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6" id="image">
                        <div class="input-style-1">
                            <label for="galleryformFile" class="form-label">Image</label>
                            <input class="form-control" name="image" type="file" id="galleryformFile">
                            @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6 d-none" id="video_link">
                        <div class="input-style-1">
                            <label for="video_link">{{ __('video link') }}</label>
                            <input type="url" @error('video_link') class="form-control is-invalid" @enderror name="video_link" id="video_link"
                                placeholder="{{ __('video link') }}" value="{{ old('video_link')}}">
                                <span class="text-info">
                                    <strong>Give Video Links.</strong>
                                </span>
                            </div>
                        </div>
                        @error('video_link')
                        <span class="text-danger">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    <!-- end col -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
@push('script')
<script>
    $("#type").change(function(){
        // alert($("#type").val())
        if(parseInt($("#type").val())===1){
            $("#image").addClass('d-none')
            $("#video_link").removeClass('d-none')
        }else{
            $("#video_link").addClass('d-none')
            $("#image").removeClass('d-none')
        }
    });
</script>
@endpush
