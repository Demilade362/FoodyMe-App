@extends('admin.layouts.app')

@section('content')
    @if (session('msg'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{{ session('msg') }}</span>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td align="center">
                            <div class="d-flex-justify-content-between">
                                <a href="{{ route('admin.products.show', $product->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-secondary btn-sm">
                                    <i class="bi bi-pencil"></i>
                                    Edit
                                </a>
                                <form action="{{ route('admin.products.destroy', $product->id) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                        Delete
                                    </button>
                                </form>
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
