<div class="banner-carousel banner-carousel-1 mb-0">
    @php
    $slider=App\Models\Slider::where('status',1)->get();
    @endphp
    @forelse ($slider as $slide)
    <div class="banner-carousel-item" style="background-image: url({{$slide->image}})">
        <div class="slider-content">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12 {{$slide->direction}}">
                        <h2 style="color:black;" class="slide-sub-title" data-animation-in="{{$slide->animation}}">
                            {{$slide->title}}
                        </h2>
                        @if($slide->description)
                        <p style="color:black;" class="slide-title" data-animation-in="slideInRight">
                            {{$slide->description}}
                        </p>
                        @endif
                        @if($slide->link)
                        <p data-animation-in="{{$slide->animation}}" data-duration-in="1.2">
                            <a href="{{url($slide->link)}}" class="slider btn btn-primary">Our Services</a>
                        </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="banner-carousel-item" style="background-image: url(https://picsum.photos/seed/picsum/500/300)">
        <div class="slider-content text-left">
            <div class="container h-100">
                <div class="row align-items-center h-100">
                    <div class="col-md-12">
                        <h2 class="slide-title-box" data-animation-in="slideInDown">
                            Find Your Study Destination
                        </h2>
                        <p class="slide-title" data-animation-in="fadeIn">
                            We are one of the growing Education & Immigration Consultancy providing best quality student
                            service and processing
                            student visa all over the world. We do have skilled experienced team who are always willing
                            to assist you to fulfill
                            your dream.
                        </p>
                        <p data-animation-in="slideInRight">
                            <a href="" class="slider btn btn-primary border">Our Services</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforelse
</div>
