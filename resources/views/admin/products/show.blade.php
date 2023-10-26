@extends('admin.layouts.app')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.products.index') }}" class="btn btn-warning">Products Page
            <i class="bi bi-bag"></i>
        </a>
    </div>
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-7">
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
