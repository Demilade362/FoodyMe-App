@extends('layouts.app')

@section('content')
    <div class="container my-5">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-light p-5">
                <thead>
                    <tr>
                        <th scope="col">Product Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Adjust Quantity</th>
                        <th scope="col">Price</th>
                        <th scope="col">Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cartItems as $item)
                        <tr class="">
                            <td scope="row">
                                <img src="{{ $item->attributes->image }}" class="img-fluid rounded" width="300"
                                    height="300" alt="image">
                            </td>
                            <td>
                                <h4 class="text-uppercase">{{ $item->name }}</h4>
                            </td>
                            <td>
                                <form action="{{ route('cart.update') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div class="d-flex">
                                        <input type="text" name="quantity" class="form-control rounded-0"
                                            value="{{ $item->quantity }}" />
                                    </div>
                                </form>
                            </td>
                            <td>
                                ${{ $item->price }}
                            </td>
                            <td>
                                <form action="{{ route('cart.remove') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $item->id }}" name="id">
                                    <button class="btn btn-danger col-12">Delete</button>
                                </form>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="text-end">
            <div class="lead mb-3">
                Total: ${{ Cart::getTotal() }}
            </div>
            <div class="d-flex justify-content-end align-items-center">
                <form action="{{ route('cart.clear') }}" method="POST">
                    @csrf
                    <button class="btn btn-danger">
                        <i class="bi bi-trash"></i>
                        Clear
                        Carts</button>
                </form>
                <form action="{{ route('cart-session') }}" method="POST" class="ms-4">
                    @csrf
                    <button class="btn btn-success">
                        <i class="bi bi-check"></i>
                        Checkout</button>
                </form>
            </div>
        </div>
    </div>
@endsection
