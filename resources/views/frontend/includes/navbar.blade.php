<div class="bg-light">


    @php
    $studies=App\Models\Study::select('id','title','slug')->get();
    @endphp
    <div class="container">
        <div class="row py-2">
            <div class="col-lg-8 col-md-8">
                <ul class="top-info text-center text-md-left">
                    <li>
                        <i class="fas fa-map-marker-alt"></i>
                        @if (isset($setting))
                        <p class="info-text">{{$setting->address}}</p>

                        @else
                        <p class="info-text mt-2 mt-md-0">Plot-97, House No-07(3rd Floor), Road -05, Block- F, Banani,
                            Dhaka-1213</p>
                        @endif
                    </li>
                </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
                <ul class="list-unstyled">
                    <li>
                        @if(isset($setting) && $setting->social_links)
                        <a title="Facebook" href="{{$setting->social_links?$setting->social_links['facebook']:''}}">
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        <a title="Twitter" href="{{$setting->social_links?$setting->social_links['twitter']:''}}">
                            <span class="social-icon"><i class="fab fa-twitter"></i></span>
                        </a>
                        <a title="Instagram" href="{{$setting->social_links?$setting->social_links['instagram']:''}}">
                            <span class="social-icon"><i class="fab fa-instagram"></i></span>
                        </a>
                        <a title="whatsapp" href="{{$setting->social_links?$setting->social_links['whatsapp']:''}}">
                            <span class="social-icon"><i class="fab fa-whatsapp"></i></span>
                        </a>
                        @else
                        <a title="Facebook" href="https://www.facebook.com/sqginternational>
                            <span class="social-icon"><i class="fab fa-facebook-f"></i></span>
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
            <!--/ Top social end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
    <!--/ Topbar end -->
    <!-- Header start -->
    <header id="header">
        <div class="container">
            <div class="logo-area">
                <div class="row align-items-center">
                    <div class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                        <a class="d-block" href="{{url('/')}}">
                            @if(isset($setting))
                            <img loading="lazy" src="{{$setting->logo}}" alt="Constra" />
                            @elseif(!isset($setting))
                            <img loading="lazy" src="{{asset('logo.png')}}" alt="Constra" />
                            @else
                            <h3>{{$setting->name}}</h3>
                            @endif
                        </a>
                    </div>
                    <!-- logo end -->

                    <div class="col-lg-9 header-right">
                        <nav class="navbar navbar-expand-lg p-0">
                            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target=".navbar-collapse"
                                aria-controls="navbar-collapse" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="white" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-7 6h7" />
                                </svg></span>
                            </button>

                            <div id="navbar-collapse" class="collapse navbar-collapse">
                                <ul class="nav navbar-nav ml-auto">
                                    <li class="nav-item @if(request()->route()->uri()==='/') active @endif">
                                        <a href="{{url('/')}}" class="nav-link"
                                           >Home</a>
                                    </li>

                                    <li class="nav-item dropdown @if(request()->is('about-us')||request()->is('about-us/*')) active @endif">
                                        <a href="{{route('aboutUs')}}"
                                            class="nav-link dropdown-toggle "
                                            data-toggle="dropdown"
                                            >About Us</a>
                                        <ul class="dropdown-menu" role="menu">
                                            <li><a href="{{route('aboutUs')}}#ceo-talk">CEO's Message</a></li>
                                            <li><a href="{{route('aboutUs')}}#service">Services</a></li>
                                            <li>
                                                <a href="{{route('aboutUs')}}#team">Our Team</a>
                                            </li>
                                        </ul>
                                    </li>

                                    <li class="nav-item dropdown @if(request()->is('study-with-us')||request()->is('study-with-us/*')) active @endif">
                                        <a href="#" class="nav-link dropdown-toggle " data-toggle="dropdown">Study
                                            Abroad</a>
                                        <ul class="dropdown-menu" role="menu">
                                            @foreach($studies as $std)
                                            <li><a href="{{route('study.place',$std->slug)}}">Stydy in {{$std->title}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="nav-item @if(request()->routeIs('service')||request()->is('service/*')) active @endif">
                                        <a href="{{route('service')}}"  class="nav-link ">Services</a>
                                        {{-- <ul class="dropdown-menu" role="menu">
                                            <li><a href="services.html">Services All</a></li>
                                            <li>
                                                <a href="service-single.html">Services Single</a>
                                            </li>
                                        </ul> --}}
                                    </li>

                                    <li class="nav-item dropdown @if(request()->is('our-gallery')||request()->is('our-gallery/*')) active @endif">
                                        <a href="{{route('gallery')}}" class="nav-link dropdown-toggle ">Gallery</a>
                                        {{-- <ul class="dropdown-menu" role="menu">
                                            <li><a href="typography.html">Typography</a></li>
                                            <li><a href="404.html">404</a></li>
                                            <li class="dropdown-submenu">
                                                <a href="#!" class="dropdown-toggle" data-toggle="dropdown">Parent
                                                    Menu</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#!">Child Menu 1</a></li>
                                                    <li><a href="#!">Child Menu 2</a></li>
                                                    <li><a href="#!">Child Menu 3</a></li>
                                                </ul>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    <li class="nav-item @if(request()->is('#contact')||request()->is('#contact/*')) active @endif">
                                        <a class="nav-link" href="#contact">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <!--/ Container end -->

                        <!-- </div> -->
                    </div>
                    <!-- header right end -->
                </div>
                <!-- logo area end -->
            </div>
            <!-- Row end -->
        </div>
    </header>
</div>
