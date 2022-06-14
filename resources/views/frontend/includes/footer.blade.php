</div>
<footer id="contact" class="footer pt-5">
    <div class="container">
        <h2 class="heading-section mb-5 font-weight-bold">Contact Form</h2>
        <div class="row justify-content-center my-4">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row mb-5">
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center gap-3">
                                <div class="icon">
                                    <span class="fa fa-map-marker-alt"></span>
                                </div>
                                <div class="text-center">
                                    @if(isset($setting))
                                    <p>{{$setting->address}}</p>
                                    @else
                                    <p>Plot-97, House No-07(3rd Floor), Road -05, Block- F, Banani, Dhaka-1213</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center gap-5">
                                <div class="icon">
                                    <span class="fa fa-phone-alt"></span>
                                </div>
                                <div class="text-center">
                                    @if(isset($setting)&& $setting->phone[0])
                                    <p>
                                        <a href="tel:{{$setting->phone[0]}}">{{$setting->phone[0]}}</a>
                                    </p>
                                    @else
                                    <p>
                                        <a href="tel:8801322446944">8801322446944</a>
                                    </p>
                                    @endif
                                    @if(isset($setting)&& $setting->phone[1])
                                    <p>
                                        <a href="tel:{{$setting->phone[1]}}">{{$setting->phone[1]}}</a>
                                    </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex justify-content-center gap-3">
                                <div class="icon">
                                    <span class="fa fa-envelope"></span>
                                </div>
                                <div class="text-center ml-2">
                                    @if(isset($setting)&& $setting->email)
                                   <p><a href="mailto:{{$setting->email}}">{{$setting->email}}</a>
                                </p>
                                @else
                                <p><a href="mailto:diu.ac">sqginternational@gmail.com</a>
                                </p>

                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-7">
                            <div class="contact-wrap w-100">
                                <form method="POST" action="{{route('contact.store')}}" id="contactForm"
                                    name="contactForm" class="contactForm" novalidate="novalidate">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="label" for="name">Full Name</label>
                                                <input type="text" class="form-control rounded" name="name" id="name"
                                                    placeholder="Name">
                                            </div>
                                            @error('name')<p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="label" for="phone">Contact Number</label>
                                                <input type="tel" class="form-control rounded" name="phone" id="phone"
                                                    placeholder="Phone">
                                            </div>@error('phone')<p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="label" for="email">Email Address</label>
                                                <input type="email" class="form-control rounded" name="email" id="email"
                                                    placeholder="email">
                                            </div>
                                            @error('email')<p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="col-md-12 mt-2">
                                            <div class="form-group">
                                                <label class="label" for="#">Message</label>
                                                <textarea name="message" class="form-control rounded h-full" rows="5"
                                                    id="message" placeholder="Message"></textarea>
                                            </div>@error('message')<p class="text-danger">{{$message}}</p>@enderror
                                        </div>
                                        <div class="col-md-12 my-2">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-danger d-block w-100">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.8294825707603!2d90.39967341544438!3d23.78908569321322!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7aa351e05d7%3A0x88b47398b8838e6c!2sS%20Quadir%20Group!5e0!3m2!1sen!2sbd!4v1654692855555!5m2!1sen!2sbd"
                                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer main end -->
    <div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top position-fixed">
        <button class="btn btn-primary" title="Back to Top">
            <i class="fa fa-angle-double-up"></i>
        </button>
    </div>
    <div class="copyright mt-6">
        <p class="text-center text-white">&copy; All rights belongs to SQG | Developed By DIU IT Team</p>
    </div>
    <!-- Copyright end -->
</footer>
<!-- Footer end -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('plugins/slick/slick.min.js') }}"></script>
<script src="{{ asset('plugins/slick/slick-animation.min.js') }}"></script>
<script src="{{ asset('plugins/colorbox/jquery.colorbox.js') }}"></script>
<script src="{{ asset('plugins/shuffle/shuffle.min.js') }}" defer></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="{{ asset('plugins/bootstrap/bootstrap.min.js') }}"></script>
@if(Session::has('success'))
<script>
    swal({title:"{{session('success')}}",icon:"success"});
</script>
@endif
<script>
    $(document).ready(function () {
        $(window).on("load", () => $("#preloader").fadeOut('800'));
    })
</script>
@stack('script')
</div>
<!-- Body inner end -->
</body>

</html>
