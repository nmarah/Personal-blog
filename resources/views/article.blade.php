@extends('layouts.front')

@section('title', $article->name)
@section('contant')

    <div id="colorlib-main">
        <div class="hero-wrap js-fullheight" style="background-image: url({{ asset('images/bg_1.jpg') }});"
            data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="js-fullheight d-flex justify-content-center align-items-center">
                <div class="col-md-8 text text-center">
                    <div class="desc">
                        <h1 class="mb-4">{{$article->name}}</h1>
                        <p><a href="{{ route('index')}}" class="btn-custom mr-2">Blog <span class="ion-ios-arrow-forward"></span></a> <a
                                href="{{ route('index')}}" class="btn-custom mr-2">Articales <span class="ion-ios-arrow-forward"></span></a>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn-custom">{{$article->name}}  <span class="ion-ios-arrow-forward"></span></a></p>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 ftco-animate">

                        <h2 class="mb-3 font-weight-bold">{{ $article->title}}</h2>
                        <p>{!! nl2br($article->disc) !!}
                        </p>
                        <p>
                            @if($article->video)
                            <video src="{{Storage::disk('local')->url($article->video)}}" controls></video>
                            @elseif($article->image)
                            <img src="{{ Storage::disk('local')->url($article->image) }}" alt="" class="img-fluid"> 
                            @elseif ($article->file)
                            {{-- <iframe src="{{ Storage::disk('local')->url($article->file) }}" style="width:600px; height:500px;" frameborder="0"></iframe> --}}
                            <embed src="{{ Storage::disk('local')->url($article->file) }}" type="application/pdf" width="100%" height="600px" />

                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </section>




    @endsection
