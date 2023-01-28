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
                            @elseif ($article->file)
                            <iframe src="{{ Storage::disk('local')->url($article->file) }}" style="width:600px; height:500px;" frameborder="0"></iframe>
                            {{-- <embed src="{{ Storage::disk('local')->url($article->file) }}" type="application/pdf" width="100%" height="600px" /> --}}

                            @elseif($article->image)
                            <img src="{{ Storage::disk('local')->url($article->image) }}" alt="" class="img-fluid"> 
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            <div class="pt-5 col-md-8 mt-5">
                <h3 class="mb-5 font-weight-bold">{{$commentsCount == 0 ? '' : $commentsCount }} Comments</h3>
                <ul class="comment-list">
                    @foreach ($comments as $comment)
                  <li class="comment">
                    <div class="vcard bio">
                        @if( $genderDetector->detect($comment->name) =='female')
                        @php
                        $woman = ["woman.png","woman1.png","woman2.png"];
                    @endphp
                        <img src="{{asset('images/'.$woman[array_rand($woman)])}}" alt="Image placeholder">                    
                      @else
                      @php
                        $man = ["man.png","man1.png","man2.png","man3.png"];
                    @endphp
                      <img src="{{asset('images/'.$man[array_rand($man)])}}" alt="Image placeholder">
                      @endif

                    </div>
                <div class="comment-body">
                      <h3>{{ $comment->name }}</h3>
                      <div class="meta">{{ $comment->created_at->format('jS M Y h:i A') }}</div>
                      <p> {{ $comment->body }}</p>
                      <p><a href="#" class="reply">Reply</a></p>
                    </div>
                  </li>
                  @endforeach

                
                </ul>
                <!-- END comment-list -->
                
                <div class="comment-form-wrap pt-5">
                  <h3 class="mb-5">Leave a comment</h3>
                  <form action="{{route('comments.store', $article)}}" method="POST" class="p-3 p-md-5 bg-light">
                    @csrf
                    <div class="form-group">
                      <label for="name">Name *</label>
                      <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                      <label for="email">Email *</label>
                      <input type="email" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-group">
                      <label for="message">Message</label>
                      <textarea name="body" id="body" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        {{-- <input type="hidden" name="parent_id" value="{{ $comment->id }}"> --}}

                      <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary">
                    </div>

                  </form>
                </div>
            </div>
        </section>




    @endsection
