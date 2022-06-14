@extends('frontend.master')
@section('title')
All Serivces
@endsection
@section('content')
@php
$icons=['service-icon1','service-icon2','service-icon3','service-icon4','service-icon5','service-icon6'];
@endphp
<div id="banner-area" class="banner-area" style="background-image:url({{asset('images/banner/banner1.jpg')}}">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Services</h1>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div>
<section id="main-container" class="main-container pb-2">
    <div class="container">
        <div class="row">
            @forelse ($services as $service)
            <div class="col-lg-4 col-md-6 mb-5">
                <div class="ts-service-box">
                    <div class="ts-service-image-wrapper">
                        <img loading="lazy" class="w-100" src="{{$service->image}}" alt="service-image">
                    </div>
                    <div class="d-flex">
                        <div class="ts-service-box-img">
                            <img loading="lazy" src='{{asset("images/icon-image/".$icons[rand(0,5)].".png")}}'
                                alt="service-icon">
                        </div>
                        <div class="ts-service-info">
                            <h3 class="service-box-title"><a href="#{{$service->slug}}">{{$service->name}}</a></h3>
                            <p>{{$service->description}}</p>
                        </div>
                    </div>
                </div><!-- Service1 end -->
            </div><!-- Col 1 end -->

            @empty
            <div class="col-12">

                <h2 class="text-center">OUR SERVICES WILL START SOON . <span class="text-danger">PLEASE STAY WITH
                        US</span></h2>
            </div>
            @endforelse

        </div><!-- Main row end -->
    </div><!-- Conatiner end -->
</section>
@endsection
