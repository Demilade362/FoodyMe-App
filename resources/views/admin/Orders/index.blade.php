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
                    <th scope="col">Address</th>
                    <th scope="col">User</th>
                    <th scope="col">Group Order</th>
                    <th scope="col">Order Time</th>
                    <th scope="col" align="start"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr class="">
                        <td>{{ $order->product_name }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->group_order == 1 ? 'True' : 'False' }}</td>
                        <td>{{ $order->created_at->diffForHumans() }}</td>
                        <td align="end">
                            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                    Take Order
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $orders->links() }}
        </div>
    </div>
@endsection
