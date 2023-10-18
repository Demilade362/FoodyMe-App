@extends('layouts.app')

@section('content')
    .<div class="container mt-5">
        <div class="row justify-content-between align-items-center g-2">
            <div class="col-lg-7">
                <img src="{{ $product->image->image_url }}" class="img-fluid rounded" alt="burger">
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

                <button type="submit" class="btn btn-warning shadow-sm col-12" data-bs-toggle="modal"
                    data-bs-target="#modalId">
                    <i class="bi bi-check"></i>
                    Check Out</button>
            </div>
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
                                    <th scope="col">Total Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="">
                                    <td scope="row"><span id="quantity_text" class="text-sm"></span></td>
                                    <td>$<span id="total_text" class="text-sm"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="" method="post">
                        @csrf
                        <input type="text" name="product_name" id="product_name" hidden>
                        <input type="number" name="quantity" id="quantity" hidden>
                        <input type="number" name="total_price" id="total" hidden>
                        <button type="submit" class="btn btn-warning shadow-sm col-12">
                            <i class="bi bi-bag"></i>
                            Order Now</button>
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
            let price = {{ $product->price }}
            let result = document.querySelector('#result')
            let quantity = document.querySelector("#quantity")
            let total = document.querySelector("#total")

            let quantity_text = document.querySelector('#quantity_text')
            let total_text = document.querySelector('#total_text')

            subtract.addEventListener('click', () => {
                result.innerHTML = --counter
                quantity.value = counter
                total.value = counter * price
                quantity_text.innerHTML = counter
                total_text.innerHTML = counter * price
            })

            add.addEventListener('click', () => {
                result.innerHTML = ++counter
                quantity.value = counter
                total.value = counter * price
                quantity_text.innerHTML = counter
                total_text.innerHTML = counter * price
            })
        </script>
    @endpush
@endsection
