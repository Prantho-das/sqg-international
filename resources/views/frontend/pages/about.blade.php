@extends('frontend.master')
@section('title') About @endsection
@section('content')
<section id="ceo-talk">
    <div class="container">
        @forelse ($ceos as $ceo)
        <article class="ceo">
            <div class="ceo_image mx-auto">
                <img src="{{$ceo->image}}" class="img-fluid" alt="ceo-talk" />
            </div>
            <div class="ceo_bio text-center mt-5">
                <h3>{{$ceo->name}}</h3>
                <h6>{{$ceo->designation}}</h6>
            </div>
            <div class="ceo_descripiton mt-4 text-justify">
                {{$ceo->talk}}
            </div>
        </article>
        @empty
        <article class="ceo mt-5">
            <div class="ceo_image mx-auto">
                <img src="https://via.placeholder.com/1500/0000FF/808080" class="img-fluid" alt="ceo-talk" />
            </div>
            <div class="ceo_bio text-center mt-5">
                <h3>Mosharraf Hossain Shimul</h3>
                <h6>Director of S.Quadir Group</h6>
            </div>
            <div class="ceo_descripiton mt-4">
                <p class="text-justify">
                    It gives me great pleasure to introduce myself, I am Mosharraf
                    Hossain Shimul the director of S.Quadir Group. We believe that
                    only quality education can improve families and nations. Young
                    educated students are the backbone of the country.
                </p>
                <p class="text-justify">
                    There are many skilled students among our young generation who
                    don’t know the right way to prepare themselves for higher study
                    abroad. So, we SQG International always stand by our students as
                    a shadow for their help at any steps to their progress and
                    career.
                </p>
                <p class="text-justify">
                    It’s my great satisfaction to work with SQG International which
                    is an up-growing education and immigration consultancy firm. In
                    the present age, our young generation wants to improve the
                    nation not only by keeping their talents among themselves but
                    also by spreading them all over the world so there is no
                    alternative to higher education in that field. So, I feel
                    blessed to be a part of being SQG family and I always try to
                    stand for new generation for their bright future.
                </p>
            </div>
        </article>
        @endforelse
    </div>
</section>
<section id="service">
    <div class="container">
        <h1 class="display-4 font-weight-bold text-center">
            Servi<span class="text-danger">ces</span>
        </h1>
        <div class="row mt-5 g-2">
            @forelse ($services as $service)
            <div class="col-md-6 col-12 mb-4">
                <div class="card d-flex justify-content-end px-2" style="background-image: url({{$service->image}});height:18rem;background-size: cover;background-position: center;">
                    <h6 class="title text-danger text-right">{{$service->name}}</h6>
                </div>
            </div>
            @empty
            <div class="col-md-6 col-12 mb-4">
                <div class="card d-flex justify-content-end px-2" style="background-image: url(https://picsum.photos/seed/picsum/500/300);height:18rem;
    background-size: cover;
    background-position: center;">
                    <h6 class="title text-danger text-right">Carrer Counseling</h6>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>
<!-- Ceo talk end-->
<section>
    <div class="container">
        <div class="row mt-5 no-gutters">
            <div class="col-md-6 col-12 p-4 bg-light">
                <h4 class="text-justify mt-4">SQG International Education & Immigration Consultancy Firm’s vision is
                    required information, perfect guidelines and making it adjustable in other countries our students.
                    Our
                    vision is also to bring possible outcomes to each student and contribute to the large society doing
                    something better.</h4>
            </div>
            <div class="col-md-6 col-12">
                <img loading="lazy" class="img-fluid" src="{{asset('images/cc.jpg')}}" class="img-fluid"
                    alt="">
            </div>
        </div>
    </div>
</section>
<section id="right-info" class="bg-light">
    <div class="container text-right">
        <h1 class="display-4 font-weight-bold">
            Provide
        </h1>
        <h1 class="display-4 font-weight-bold text-danger">
            Right
        </h1>
        <h1 class="display-4 font-weight-bold">
            Information
        </h1>
        <div class="decription ml-auto w-75">
            <p class="mt-5">
                We contribute students accurate information about going abroad to study, Like which course from which
                university in which country is suitable for that student’s previous study background.
            </p>
        </div>
    </div>
</section>

<section id="format-documents">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-6 col-12 text-center">
                <h1>Formatting <span class="text-danger">Documents</span></h1>
                <h4 class="mt-4">We will guide you through the entire visa process, including application forms, offer
                    later, recommendation later and financial reports to achieve 100% visa success. Our documentation
                    team
                    aims to help students create their own documents. We support paperwork related to universities and
                    colleges.</h4>
            </div>
            <div class="col-md-6 col-12">
                <img loading="lazy" class="img-fluid" src="{{asset('images/fd.jpg')}}" class="img-fluid"
                    alt="">
            </div>
        </div>
    </div>
</section>
<section id="visa">
    <div class="container">
        <h1 class="text-right mb-5 display-4">Visa <span class="text-danger">Preparation</span></h1>
        <div class="visa_image mx-auto">
            <img src="{{asset('images/visa.webp')}}" class="img-fluid" alt="ceo-talk" style="height: 100%"/>
        </div>
        <p class="text-justify mt-5">
            Assalamu Alaikum, It is my great pleasure to express my
            gratitude and extend heartfelt greetings to the readers. SQG
            International is a sister concern of the S.Quadir group. SQG
            International is a sister concern of an up-growing educational
            consultancy firm of S.Quadir group. We are trying to provide all
            kinds of necessary information and services to our students who
            are interested to study in abroad.
        </p>
    </div>
</section>
<section id="team">
    <div class="container">
        <h1 class="text-right mb-5">Our <span class="text-danger">Team</span></h1>
        <div class="row text-center mt-5">
            @foreach ($teams as $team)
            <div class="team-info  @if($loop->first) col-12 mb-4 @else col-md-6  @endif">
                <h3>{{$team->name}}</h3>
                <h6>{{$team->designation}}</h6>
                <p>Contact: {{$team->phone}}</p>
                <p>Mail: {{$team->email}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
