@extends('layouts.front')

@section('title', 'About')
@section('contant')
    @foreach ($about as $about)
        <?php 
        $image = $about->image;?>
    @endforeach
    <div id="colorlib-main">
        <div class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url({{ asset('images/bg_1.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="js-fullheight d-flex justify-content-center align-items-center">
                <div class="col-md-8 text text-center">
                    <div class="img mb-4" style="background-image: url({{Storage::disk('local')->url($image) }});"></div>
                    <div class="desc">
                        <h2 class="subheading">Hello I'm</h2>
                        <h1 class="mb-4">{{ $about->full_name }}</h1>
                        <p class="mb-4"><span class="h5">{{$about->about_me}}</span>
                          {{-- I am A Blogger Far far away, behind the word mountains, far from the countries
                            Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                            at the coast of the Semantics, a large language ocean. --}}
                        </p>
                        <ul class="ftco-social mt-3">
                            <li class="ftco-animate"><a href="{{ $about->twitter }}"><span class="icon-twitter"></span></a>
                            </li>
                            <li class="ftco-animate"><a href="{{ $about->facebook }}"><span class="icon-facebook"></span></a>
                            </li>
                            <li class="ftco-animate"><a href="{{ $about->instagram }}"><span class="icon-instagram"></span></a>
                            </li>
                            <li class="ftco-animate"><a href="{{ $about->linkedin }}"><span class="icon-linkedin"></span></a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- END COLORLIB-MAIN -->


@endsection
