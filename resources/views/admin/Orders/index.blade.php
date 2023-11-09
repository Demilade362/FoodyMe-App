@extends('admin.layouts.app')

@section('content')
    @if (session('msg'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <span>{{ session('msg') }}</span>
        </div>
    @endif

    <!-- Nav tabs -->
    <ul class="nav nav-tabs mb-3" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
                role="tab" aria-controls="home" aria-selected="true">Normal Orders</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                role="tab" aria-controls="profile" aria-selected="false">Group Orders</button>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                        @foreach ($normalOrders as $normal)
                            <tr class="">
                                <td>{{ $normal->product_name }}</td>
                                <td>{{ $normal->total_price }}</td>
                                <td>{{ $normal->quantity }}</td>
                                <td>{{ $normal->address }}</td>
                                <td>{{ $normal->user->name }}</td>
                                <td>{{ $normal->group_order == 1 ? 'True' : 'False' }}</td>
                                <td>{{ $normal->created_at->diffForHumans() }}</td>
                                <td align="end">
                                    <div class="d-flex-justify-content-between">
                                        <a href="{{ route('admin.orders.show', $normal->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i>
                                            View
                                        </a>
                                        <a href="{{ route('admin.orders.show', $normal->id) }}"
                                            class="btn btn-secondary ms-2 btn-sm">
                                            <i class="bi bi-eye"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.orders.show', $normal->id) }}"
                                            class="btn btn-danger btn-sm">
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
                    {{ $normalOrders->links() }}
                </div>
            </div>
        </div>
        <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                        @foreach ($groupOrders as $group)
                            <tr class="">
                                <td>{{ $group->product_name }}</td>
                                <td>{{ $group->total_price }}</td>
                                <td>{{ $group->quantity }}</td>
                                <td>{{ $group->address }}</td>
                                <td>{{ $group->user->name }}</td>
                                <td>{{ $group->group_order == 1 ? 'True' : 'False' }}</td>
                                <td>{{ $group->created_at->diffForHumans() }}</td>
                                <td align="end">
                                    <div class="d-flex-justify-content-between">
                                        <a href="{{ route('admin.orders.show', $group->id) }}"
                                            class="btn btn-success btn-sm">
                                            <i class="bi bi-eye"></i>
                                            View
                                        </a>
                                        <a href="{{ route('admin.orders.show', $group->id) }}"
                                            class="btn btn-secondary ms-2 btn-sm">
                                            <i class="bi bi-eye"></i>
                                            Edit
                                        </a>
                                        <a href="{{ route('admin.orders.show', $group->id) }}"
                                            class="btn btn-danger btn-sm">
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
                    {{ $groupOrders->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
