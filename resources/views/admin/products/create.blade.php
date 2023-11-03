@extends('admin.layouts.app')

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <form action="{{ route('admin.products.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name</label>
                    <input type="text" name="product_name"
                        class="form-control mb-3 @error('product_name') is-invalid @enderror" id="name"
                        value="{{ old('product_name') }}" />
                    @error('product_name')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="product_description" class="form-label">Product Description</label>
                    <textarea rows="5" cols="10" type="text" name="product_description"
                        class="form-control mb-3 @error('product_description') is-invalid @enderror" id="description" spellcheck="true">@php echo old('product_description');@endphp</textarea>
                    @error('product_description')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control mb-3 @error('price') is-invalid @enderror"
                        id="price" value="{{ old('price') }}" step="0.01" />
                    @error('price')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image_url" class="form-label">Image Url</label>
                    <input type="file" name="image_url"
                        class="form-control mb-3 @error('image_url') is-invalid @enderror" id="image_url" />
                    @error('image_url')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger col-12">Create Product
                    <i class="bi bi-plus"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
