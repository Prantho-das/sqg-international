@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Website Settings') }}</h2>
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

            <form action="{{ route('setting.settingStore') }}" enctype="multipart/form-data" method="POST">
                @csrf

                <div class="row">
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="name">{{ __('Name') }}</label>
                            <input type="text" @error('name') class="form-control is-invalid" @enderror name="name"
                                id="name" placeholder="{{ __('Name') }}"
                                value="{{ old('name', isset($setting->name)?$setting->name:'')}}" required>
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
                                value="{{ old('email', isset($setting->email)?$setting->email:'')}}" required>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input @error('phone') class="form-control is-invalid" @enderror type="phone" name="phone"
                                id="phone" placeholder="{{ __('phone') }}"
                                value="{{ old('phone', isset($setting->phone[0])?$setting->phone[0]:'')}}" required>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-style-1">
                            <label for="alt_phone">{{ __('ALt. Phone') }}</label>
                            <input @error('alt_phone') class="form-control is-invalid" @enderror type="alt_phone"
                                name="alt_phone" id="alt_phone" placeholder="{{ __('alt phone') }}"
                                value="{{ old('alt_phone', isset($setting->phone[1])?$setting->phone[1]:'') }}"
                                required>
                            @error('alt_phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->

                    <div class="col-md-3">
                        <div class="input-style-1">
                            <label for="facebook">{{ __('Facebook') }}</label>
                            <input type="url" @error('facebook') class="form-control is-invalid" @enderror
                                name="facebook"
                                value="{{ old('facebook', isset($setting->social_links['facebook'])?$setting->social_links['facebook']:'') }}"
                                id="facebook" placeholder="{{ __('facebook link') }}" required>
                            @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-style-1">
                            <label for="twitter">{{ __('Twitter') }}</label>
                            <input type="url" @error('twitter') class="form-control is-invalid" @enderror
                                value="{{ old('twitter', isset($setting->social_links['twitter'])?$setting->social_links['twitter']:'') }}"
                                name="twitter" id="twitter" placeholder="{{ __('twitter link') }}">
                            @error('twitter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-style-1">
                            <label for="url">{{ __('Instagram') }}</label>
                            <input type="url" @error('instagram') class="form-control is-invalid" @enderror
                                value="{{ old('instagram', isset($setting->social_links['instagram'])?$setting->social_links['instagram']:'') }}"
                                name="instagram" id="instagram" placeholder="{{ __('instagram link') }}">
                            @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-style-1">
                            <label for="wapp">{{ __('Whats App') }}</label>
                            <input type="url" @error('wapp') class="form-control is-invalid" @enderror
                                value="{{ old('wapp', isset($setting->social_links['whatsapp'])?$setting->social_links['whatsapp']:'') }}"
                                name="wapp" id="wapp" placeholder="{{ __('Whats App Link') }}" required>
                            @error('wapp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="address">{{ __('Address') }}</label>
                            <input type="text" @error('address') class="form-control is-invalid" @enderror
                                name="address" id="address"
                                value="{{ old('address', isset($setting->address)?$setting->address:'') }}"
                                placeholder="{{ __('Address') }}" required>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style-1">
                            <label for="formFile" class="form-label">Logo</label>
                            <input class="form-control" name="logo" type="file" accept="images/*" id="formFile">
                        @error('logo')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        </div>
                        @if(isset($setting->logo))
                        <img src="{{$setting->logo}}" width="200" height="200" alt="" class="img-fluid mb-2">
                        @endif
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
