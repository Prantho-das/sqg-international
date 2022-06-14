@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Make service') }}</h2>
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

            <form action="{{ route('study.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">{{ __('Place Name') }} <span class="text-info">(Please Enter Study Place Only)</span></label>
                            <input required type="text" @error('title') class="form-control is-invalid" @enderror name="title"
                                id="title" placeholder="{{ __('Pleace Name') }}" value="{{ old('title',)}}" >
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-md-12">
                        <div class="input-style-1">
                            <label for="description">{{ __('Short Description') }}</label>
                            <textarea id="short_description" @error('short_description') class="form-control is-invalid"
                                @enderror row="6" name="short_description" id="short_description"
                                placeholder="{{ __('Enter short description') }}" value="{{ old('short_description') }}"
                                ></textarea>

                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-style-1">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="editor" @error('description') class="form-control is-invalid" @enderror
                                row="6" name="description" id="description" placeholder="{{ __('Enter description') }}"
                                value="{{ old('description') }}" ></textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="formFile" class="form-label">Banner</label>
                            <input required class="form-control" name="banner" type="file" accept="images/*" id="formFile">
                            @error('banner')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="formFile" class="form-label">More Image</label>
                            <input required class="form-control" name="mImage[]" type="file" multiple accept="images/*"
                                id="formFile">
                            @error('mImage')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
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
    //    CKEDITOR.replace( 'description' );
$(document).ready(function() {

$('#editor').summernote({

height:300,

});

});
</script>
@endpush
