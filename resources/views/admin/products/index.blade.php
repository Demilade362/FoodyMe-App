@extends('admin.layouts.app')

@section('content')
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr class="">
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <div class="d-flex-justify-content-between">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                    View
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
@endsection
