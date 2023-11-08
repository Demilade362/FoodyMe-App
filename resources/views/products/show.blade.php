@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        @error('product_name')
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ $message }}</span>
            </div>
        @enderror
        @error('quantity')
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ $message }}</span>
            </div>
        @enderror
        @error('price')
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ $message }}</span>
            </div>
        @enderror
        @error('address')
            <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <div class="row justify-content-between align-items-center g-2">
            @if ($product)
                <div class="col-lg-7">
                    <img src="../{{ $product->image->image_url }}" class="img-fluid rounded" alt="burger">
                </div>
                <div class="col-lg-4">
                    <h6 class="display-6 text-uppercase">
                        {{ $product->product_name }}
                    </h6>
                    <p class="text-sm">
                        {{ $product->product_description }}
                    </p>
                    @php
                        $counter = 0;
                    @endphp

                    <p class="h2">${{ $product->price }}</p>

                    <div class="my-5">
                        <p class="lead">Quantity</p>
                        <div class="d-flex justify-content-around align-items-center">
                            <span class="btn btn-light border-dark border-1 shadow-sm btn-lg" id="subtract">-</span>
                            <span class="h1" id="result">
                                {{ $counter }}
                            </span>
                            <span class="btn btn-light border-dark border-1 shadow-sm btn-lg" id="add">+</span>
                        </div>
                    </div>

                    <button class="btn btn-danger shadow-sm col-12" data-bs-toggle="modal" data-bs-target="#modalId">
                        <i class="bi bi-cart-fill"></i>
                        Order</button>
                </div>
            @else
                <div class="d-flex justify-content-center align-items-center">
                    <div class="spinner-border text-primary spinner-border-sm" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            @endif
        </div>
    </div>


    <div class="modal fade" id="modalId" tabindex="-1" role="dialog" data-bs-backdrop="static"
        aria-labelledby="modalTitleId" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">Order Now <span class="text-sm">(Check your total
                            price)</span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-warning">
                            <thead>
                                <tr>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row"><span id="quantity_text" class="text-sm"></span></td>
                                    <td>{{ $product->price }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('session') }}" method="post">
                        @csrf
                        @method('POST')
                        <input type="hidden" name="id" value={{ $product->id }}>
                        <input type="text" value="{{ $product->product_name }}" name="product_name" id="product_name"
                            hidden>
                        <input type="text" name="image_url" id="image"
                            value="https://foodyme-app-production.up.railway.app/{{ $product->image->image_url }}" hidden>
                        <input type="number" name="quantity" id="quantity" hidden>
                        <input type="number" name="price" id="price" value="{{ $product->price }}" hidden>
                        <label for="address" class="form-label">Delivery Address</label>
                        <input type="text" name="address" id="address" value="{{ old('address') }}"
                            class="form-control mb-3" placeholder="16, Main Street, New york city">
                        <button type="submit" class="btn btn-danger shadow-sm col-12">
                            <i class="bi bi-check"></i>
                            Proceed To Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



    @push('scripts')
        <script>
            const subtract = document.querySelector("#subtract")
            const add = document.querySelector("#add")
            let counter = {{ $counter }}
            let result = document.querySelector('#result')
            let quantity = document.querySelector("#quantity")

            let quantity_text = document.querySelector('#quantity_text')
            let total_text = document.querySelector('#total_text')

            subtract.addEventListener('click', () => {
                result.innerHTML = --counter
                quantity.value = counter
                quantity_text.innerHTML = counter
            })

            add.addEventListener('click', () => {
                result.innerHTML = ++counter
                quantity.value = counter
                quantity_text.innerHTML = counter
            })

            const alerts = document.querySelectorAll('.container .alert')
            alerts.forEach(alert => {
                setTimeout(() => {
                    alert.classList.add('d-show')
                    alert.classList.remove('show')
                }, 4000);
            });
        </script>
    @endpush
@endsection
