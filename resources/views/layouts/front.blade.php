
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Blog | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

<link rel="icon" href="images/logo.png">
</head>

<body>

   

    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
            <h1 id="colorlib-logo"><a href="{{ route('index')}}"><img src="{{asset('images/logo.png')}}"  width="120" height="65" alt=""></a>

                </a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="home @if(Route::is('index')) colorlib-active @endif "><a href="{{ route('index')}}">Home</a></li>
                    <li class="about  @if(Route::is('about')) colorlib-active @endif"><a href="{{ route('about')}}">About</a></li>
                    <li class="contact  @if(Route::is('contact')) colorlib-active @endif"><a href="{{ route('contact')}}">Contact</a></li>
                </ul>
            </nav>

            <div class="colorlib-footer">
                <p>
                    {{-- <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                     All rights reserved | This template is made with <i class="icon-heart"
                        aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> --}}
                <ul>
                
                    <li><a href="{{$about->facebook}}"><i class="icon-facebook"></i></a></li>
                    <li><a href="{{$about->twitter}}"><i class="icon-twitter"></i></a></li>
                    <li><a href="{{$about->instagram}}"><i class="icon-instagram"></i></a></li>
                    <li><a href="{{$about->linkedin}}"><i class="icon-linkedin"></i></a></li>
                    
                </ul>
            </div>
        </aside> <!-- END COLORLIB-ASIDE -->

        @yield('contant')


        @if($footer ?? false)
            <footer class="ftco-footer ftco-bg-dark ftco-section">
                <div class="container px-md-5">
                    <div class="row mb-5">
                        
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4 ml-md-4">
                                <h2 class="ftco-heading-2">Category</h2>
                                <ul class="list-unstyled categories">
                                    
                                   @foreach ($categoriesARR as $category )
                              
                                    <li><a href="#">{{$category->name}} <span>({{ $category->articles_count }})</span></a></li>                                        
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md">
                            {{-- <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Archives</h2>
                                <ul class="list-unstyled categories">
                                    <li><a href="#">October 2018 <span>(6)</span></a></li>
                                    <li><a href="#">September 2018 <span>(6)</span></a></li>
                                    <li><a href="#">August 2018 <span>(8)</span></a></li>
                                    <li><a href="#">July 2018 <span>(2)</span></a></li>
                                    <li><a href="#">June 2018 <span>(7)</span></a></li>
                                </ul>
                            </div> --}}
                        </div>
                        <div class="col-md">
                            <div class="ftco-footer-widget mb-4">
                                <h2 class="ftco-heading-2">Have a Questions?</h2>
                                <div class="block-23 mb-3">
                                    <ul>
                                        <li><span class="icon icon-map-marker"></span><span class="text">{{$about->address}}</span></li>
                                        <li><span class="icon icon-phone"></span><span
                                                    class="text">+{{$about->phone}}</span></li>
                                        <li><span class="icon icon-envelope"></span><span
                                                    class="text">{{$about->email}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-12">

                            {{-- <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | This template is made with <i
                                    class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com"
                                    target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p> --}}
                        </div>
                    </div>
                </div>
            </footer>
            @endif
    </div><!-- END COLORLIB-PAGE -->
   
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('js/google-map.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
  

</body>

</html>
