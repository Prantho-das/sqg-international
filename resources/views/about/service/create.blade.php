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

            <form action="{{ route('about.service.store') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" @error('name') class="form-control is-invalid" @enderror name="name"
                                id="name" placeholder="{{ __('Name') }}" value="{{ old('name',)}}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-md-6">
                        <div class="select-style-1">
                            <label>Status</label>
                            <div class="select-position">
                                <select class="status" name='status'>
                                    <option value="">Select status</option>
                                    <option value="0">Inactive</option>
                                    <option value="1">Active</option>
                                </select>
                            </div>
                            @error('status')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="formFile" class="form-label">image</label>
                            <input class="form-control" name="image" type="file" accept="images/*" id="formFile">
                            @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-style-1">
                            <label for="description">{{ __('description') }}</label>
                            <textarea @error('description') class="form-control is-invalid" @enderror row="6"
                                name="description" id="description" placeholder="{{ __('Enter description') }}"
                                value="{{ old('description') }}" required></textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $description }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
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
