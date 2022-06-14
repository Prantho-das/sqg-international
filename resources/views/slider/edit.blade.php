@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Make Slide') }}</h2>
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

            <form action="{{ route('slider.update',$slider->id) }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method("put")
                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="title">{{ __('Title') }}</label>
                            <input required type="text" @error('title') class="form-control is-invalid" @enderror
                                name="title" id="title" placeholder="{{ __('Title') }}"
                                value="{{ old('title',$slider->title)}}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="link">{{ __('Button Link') }}</label>
                            <input type="url" @error('link') class="form-control is-invalid" @enderror
                                name="link" id="link" placeholder="{{ __('link') }}"
                                value="{{ old('link',$slider->link)}}">
                            @error('link')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="select-style-1">
                            <label>Animation</label>
                            <div class="select-position">
                                <select required class="status" name='animation'>
                                    <option value="" disabled>Select Animation</option>
                                    <option @if($slider->animation=="slideInDown") selected @endif
                                        value="slideInDown">Slide From Down</option>
                                    <option @if($slider->animation=="slideInLeft") selected @endif
                                        value="slideInLeft">Slide From Left</option>
                                    <option @if($slider->animation=="slideInRight") selected @endif
                                        value="slideInRight">Slide From Right</option>
                                    <option @if($slider->animation=="fadeIn") selected @endif value="fadeIn">Fade In
                                    </option>
                                    <option @if($slider->animation=="fadeOut") selected @endif value="fadeOut">Fade Out
                                    </option>
                                </select>
                            </div>
                            @error('animation')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="select-style-1">
                            <label>Direction</label>
                            <div class="select-position">
                                <select required class="status" name='direction'>
                                    <option value="" disabled>Select Slide Direction</option>
                                    <option value="text-left" @if($slider->direction=="text-left") selected @endif>Left
                                    </option>
                                    <option value="text-right" @if($slider->direction=="text-right") selected
                                        @endif>Right</option>
                                    <option value="text-center" @if($slider->direction=="text-center") selected
                                        @endif>Center</option>
                                </select>
                            </div>
                            @error('direction')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="select-style-1">
                            <label>Status</label>
                            <div class="select-position">
                                <select required class="status" name='status'>
                                    <option value="">Select status</option>
                                    <option @if($slider->status==0) selected @endif value="0">Inactive</option>
                                    <option @if($slider->status==1) selected @endif value="1">Active</option>
                                </select>
                            </div>@error('status')
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
                            <img class="img-fluid mt-2" src="{{$slider->image}}" width="100" height="100" alt="">
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
                            <textarea required @error('description') class="form-control is-invalid" @enderror row="6"
                                name="description" id="description" placeholder="{{ __('Enter description') }}"
                                value="{{ old('description') }}">{{$slider->description}}</textarea>

                            @error('description')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="button-group d-flex justify-content-center flex-wrap">
                            <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                {{ __('Update') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
