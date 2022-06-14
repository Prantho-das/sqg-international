@extends('layouts.app')

@section('content')
<!-- ========== title-wrapper start ========== -->
<div class="title-wrapper pt-30">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="title mb-30">
                <h2>{{ __('Contact us') }}</h2>
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
            <h2>Name: {{$contact->name}}</h2>
            <h4 class="my-2 text-info">Email: {{$contact->email}}</h4>
            <h5 class="mb-2">Phone: {{$contact->phone}}</h5>
            <p class="my-4">Message: {{$contact->message}}</p>
        </div>
    </div>
</div>
@endsection
