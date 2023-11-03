@props(['products'])
<div class="container my-5" id="product">
    <div class="row row-cols-1 row-cols-md-3 g-4 justify-content-center">
        @forelse ($products as $product)
            <div class="col">
                <div class="card">
                    <img src="{{ $product->image->image_url }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title text-uppercase">{{ $product->product_name }}</h5>
                        <p class="card-text">{{ $product->product_description }}</p>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="lead">
                                ${{ $product->price }}</span>
                            @auth
                                <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $product->id }}" name="id">
                                    <input type="hidden" value="{{ $product->product_name }}" name="name">
                                    <input type="hidden" value="{{ $product->price }}" name="price">
                                    <input type="hidden" value="{{ $product->image->image_url }}" name="image">
                                    <input type="hidden" value="1" name="quantity">
                                    <button class="btn btn-light d-flex justify-content-around">
                                        <i class="bi bi-cart me-2"></i>
                                        Add To Cart
                                    </button>
                                </form>
                            @endauth
                        </div>

                        @auth
                            <a href="{{ route('products.show', $product->id) }}"
                                class="btn btn-danger justify-content-center col-12 d-flex align-items-center">
                                <i class="bi bi-cart-fill me-2"></i>
                                <span>Order Now</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-6">
                <div class="d-flex justify-content-center align-items-center">
                    <div class="spinner-border text-primary spinner-border-sm me-3" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span>No Product Found</span>
                </div>
            </div>
        @endforelse
    </div>
</div>
</div>
