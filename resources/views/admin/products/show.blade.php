@extends('admin.layouts.app')

@section('content')
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-6">
            <img src="{{ $product->image->image_url }}" class="img-fluid rounded" alt="burger">
        </div>
        <div class="col-lg-5">
            <h6 class="display-6 text-uppercase">
                {{ $product->product_name }}
            </h6>
            <p class="text-sm">
                {{ $product->product_description }}
            </p>

            <p class="h2">${{ $product->price }}</p>
        </div>
    </div>
@endsection
