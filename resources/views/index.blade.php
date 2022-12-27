@extends('layouts.front')
@section('title', 'Home')


@section('contant')

    {{-- @foreach ($about as $about)
         $full_name = $about->full_name;
        $about_me = $about->about_me;
        $image = $about->image; 
    @endforeach --}}
    <div id="colorlib-main">
        <div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="js-fullheight d-flex justify-content-center align-items-center">
                <div class="col-md-8 text text-center">
                    <div class="img mb-4" style="background-image: url({{ Storage::disk('local')->url($about->image) }});"></div>
                    <div class="desc">
                        <h2 class="subheading">Hello I'm</h2>
                        <h1 class="mb-4">{{ $about->full_name }}</h1>
                        </h1>
                        <p class="mb-4"><span class="h5">{{ $about->about_me }}</span>
                            {{-- I am A Blogger Far far away, behind the word mountains, far from the countries
                            Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right
                            at the coast of the Semantics, a large language ocean.--}}</p> 
                        <p><a href="{{ route('about') }}" class="btn-custom">More About Me <span
                                    class="ion-ios-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center mb-5 pb-2">
                    <div class="col-md-7 heading-section text-center ftco-animate">
                        <h2 class="mb-4">Articles</h2>
                        <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It
                            is a paradisematic country.</p>
                    </div>
                </div>
                <div class="row ">
                    @foreach ($category as $category)
                        @if ($category->title)
                            <div class="col-md-4">
                                <div class="blog-entry ftco-animate">
                                    <a href="#" class="img img-2"
                                        style="background-image: url({{ Storage::disk('local')->url($category->image) }});"></a>
                                    <div class="text text-2 pt-2 mt-3">
                                        <span class="category mb-3 d-block"><a
                                                href="#">{{ $category->parent_name }}</a></span>
                                        <h3 class="mb-4"><a href="#">{{ $category->title }}</a></h3>
                                        <p class="mb-4">{{ $category->disc }}</p>
                                        <div class="author mb-4 d-flex align-items-center">
                                            <a href="#" class="img"
                                                style="background-image: url({{ Storage::disk('local')->url($about->image) }});"></a>
                                            <div class="ml-3 info">
                                                <span>Written by</span>
                                                <h3><a href="{{ route('about') }}">{{ $about->full_name }}</a></h3>
                                            </div>
                                        </div>
                                       
                                        <div class="half">
                                            <p><a href="#" class="btn py-2">Continue Reading <span
                                                        class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                @endif
                @endforeach


            </div>
    </div>
    </section>

@section('footer')
@show
@endsection
