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
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">User</th>
                    <th scope="col" align="start"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="">
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->price }}</td>
                        <td align="end">
                            <div class="d-flex-justify-content-between">
                                <a href="{{ route('admin.Orders.show', $order->id) }}" class="btn btn-success btn-sm">
                                    <i class="bi bi-eye"></i>
                                    View
                                </a>
                                <a href="{{ route('admin.Orders.show', $order->id) }}"
                                    class="btn btn-secondary ms-2 btn-sm">
                                    <i class="bi bi-eye"></i>
                                    Edit
                                </a>
                                <a href="{{ route('admin.Orders.show', $order->id) }}" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                    Delete
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
