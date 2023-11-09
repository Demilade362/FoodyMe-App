@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row align-items-center justify-content-around">
            <div class="col-lg-6 text-center">
                <h1 class="display-3 mb-3 text-danger">
                    <span class="text-dark">About</span> Foody<span class="text-warning">Me</span>
                </h1>
                <p class="lead">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Excepturi praesentium facilis non neque eaque
                    cupiditate vitae hic! Quod corrupti at nulla iure doloribus ipsam odit aliquam quisquam beatae quidem.
                    Aliquid.
                </p>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <img src="assets/chef.jpg" width="500" class="img-fluid" alt="image">
            </div>
        </div>
    </div>
@endsection
