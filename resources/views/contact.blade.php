@extends('layouts.front')

@section('title', 'Contact')
@section('contant')



    <div id="colorlib-main">
        <section class="ftco-section contact-section">
            <div class="container">
                <div class="row d-flex mb-5 contact-info">
                    @foreach ($about as $about)
                        <div class="col-md-12 mb-4">
                            <h2 class="h4 font-weight-bold">Contact Information</h2>
                        </div>

                        <div class="w-100"></div>
                        <div class="col-md-3">
                            <p>
								<h6>Address:</h6>
								<span>{{ $about->address }}</span>
								</p>
                        </div>
                        <div class="col-md-3">
                            <p>
								<h6>Phone:</h6>
								<span>+ {{ $about->phone }}</span>
								</p>
                        </div>
                        <div class="col-md-3">
                            <p>
								<h6>Email:</h6>
								<span>{{ $about->email }}</span> 
							</p>
                        </div>
                    @endforeach

                </div>

                <div class="row block-9">
                    <div class="col-md-6 order-md-last pr-md-5">
                        <form action="{{ route('save_ask') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="Your Email">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </form>

                    </div>


                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->

@endsection
