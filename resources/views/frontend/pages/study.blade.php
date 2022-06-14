@extends('frontend.master')
@section('title')
    study | {{$study->title}}
@endsection
@section('content')
    <section id="study-banner">
        <div class="study_banner">
            <img src="{{ $study->banner }}" class="img-fluid h-100" alt="">
        </div>
        <h1 class="banner_text text-center display-3" style="color: #ffb600">
            Study In {{ $study->title }}
        </h1>
        <div class="container mt-5">
            <p class="text-center">{{ $study->short_description }}</p>
        </div>
    </section>
    <section id="study-abroad-section">
        <div class="container">
            <div class="row">
                {!! $study->description !!}
            </div>
            <div class="country_image mt-5">
                <h2>How is {{ $study->title }}?</h2>
                <div class="country_image_slide mt-4">
                    @foreach ($study->images as $image)
                        <div><img src="{{ $image->image_link }}" alt="" class="img-fluid"></div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
