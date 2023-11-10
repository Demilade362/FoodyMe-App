@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
                <h1 class="display-5 mb-3 text-danger">
                    <span class="text-dark">Contact</span> Foody<span class="text-warning">Me</span>
                </h1>
                <p class="lead">
                    You can contact use via our social handles.
                    if you want to report a problem or speak to us on anything related to business.
                </p>
                <div class="mt-5">
                    <a href="" class="btn btn-outline-primary rounded-0">
                        <i class="bi bi-facebook-fill"></i>
                        Facebook
                    </a>
                    <a href="" class="btn btn-outline-danger rounded-0 mx-2">
                        <i class="bi bi-instagram-fill"></i>
                        Instagram
                    </a>
                    <a href="" class="btn btn-outline-primary rounded-0">
                        <i class="bi bi-twitter-fill"></i>
                        Twitter
                    </a>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="assets/chef3.png" width="2000" height="1000" class="img-fluid" alt="image">
            </div>
        </div>
    </div>

    <div class="container-fluid text-center mt-5">
        <h1>Google Maps</h1>
    </div>
@endsection
