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
                    <button class="btn btn-danger me-3">
                        <i class="bi bi-trash"></i>
                        Clear
                        Carts</button>
                </form>
                <button class="btn btn-success" class="btn btn-primary btn-lg" data-bs-toggle="modal"
                    data-bs-target="#modalId">
                    <i class="bi bi-check"></i>
                    Checkout</button>
            </div>
        </div>

        <div class="modal fade" id="modalId" data-bs-backdrop="static" data-bs-keyboard="false"
            aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalTitleId">Additional Info</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('cart-session') }}" method="POST">
                        <div class="modal-body">
                            @csrf
                            <div>
                                <label for="address" class="form-label">Address</label>
                                <input type="text" name="address" id="address" class="form-control mb-3"
                                    placeholder="16, Your address, Region or State">
                            </div>
                            <button class="btn btn-success rounded-0 col-12">
                                <i class="bi bi-check"></i>
                                Check Out</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
