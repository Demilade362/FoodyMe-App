@extends('admin.layouts.app')

@section('content')
    <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row justify-items-center mt-5">
            <div class="col-lg-6">
                <label for="product_name" class="form-label">Product Name</label>
                <input type="text" name="product_name" class="form-control mb-3" id="name" />
                <label for="product_description" class="form-label">Product Description</label>
                <textarea rows="5" cols="10" type="text" name="product_description" class="form-control mb-3"
                    id="description">
                </textarea>
            </div>
            <div class="col-lg-6">
                <label for="price" class="form-label">Price</label>
                <input type="number" name="price" class="form-control mb-3" id="price" />
                <label for="image_url" class="form-label">Image Url</label>
                <input type="file" name="image_url" class="form-control mb-3" id="image_url" />
                <label for="image_url" class="form-label">Image Url</label>
                <input type="text" name="image_url" class="form-control mb-3" id="image_url"
                    placeholder="https:://www.image.com/pizza" />
            </div>
            <div class="col-lg-12">
                <button type="submit" class="btn btn-warning col-12">Create Product</button>
            </div>
        </div>
    </form>
@endsection
