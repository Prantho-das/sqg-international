@include('frontend.includes.header')
@include('frontend.includes.navbar')
@if(!request()->routeIs('study.place') && !request()->routeIs('gallery')&& !request()->routeIs('service'))
@include('frontend.includes.slider')
@endif
@yield('content')
@include('frontend.includes.footer')
