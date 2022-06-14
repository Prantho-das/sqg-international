@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Make Ceo Talk Update') }}</h2>
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

            <form action="{{ route('about.ceoTalkUpdate',$ceo->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
@method('PUT')
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" @error('name') class="form-control is-invalid" @enderror name="name"
                                id="name" placeholder="{{ __('Name') }}"
                                value="{{ old('name',$ceo->name)}}" required>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="email">{{ __('Email') }}</label>
                            <input @error('email') class="form-control is-invalid" @enderror type="email" name="email"
                                id="email" placeholder="{{ __('Email') }}"
                                value="{{ old('email',$ceo->email)}}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="designation">{{ __('designation') }}</label>
                            <input @error('designation') class="form-control is-invalid" @enderror type="designation"
                                name="designation" id="designation" placeholder="{{ __('Designation') }}"
                                value="{{ old('designation',$ceo->designation)}}"
                                required>
                            @error('designation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input-style-1">
                            <label for="message">{{ __('Message') }}</label>
                                <textarea @error('message') class="form-control is-invalid" @enderror row="6" name="message" id="message" placeholder="{{ __('Enter Message') }}"
                                    required>{{old('message',$ceo->talk)}}</textarea>

                                @error('message')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="formFile" class="form-label">image</label>
                            <input class="form-control" name="image" type="file" accept="images/*" id="formFile">
                            @error('image')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <img src="{{$ceo->image}}" class="img-fluid mb-2" width="200" height="200" alt="">
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
