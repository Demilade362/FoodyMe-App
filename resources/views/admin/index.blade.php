@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">
                        Orders</h5>
                    <p class="card-text">
                        Check your Orders so you can deliver on time
                    </p>
                    <a href="/admin/orders" class="btn btn-danger">View Orders
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title placeholder-glow">Products</h5>
                    <p class="card-text placeholder-glow">Add new products so your customers can check out</p>
                    <a href="/admin/products" class="btn btn-danger">Add Products
                        <i class="bi bi-plus"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card border-0">
                <div class="card-body">
                    <h5 class="card-title">View Customers</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col" align="end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr class="">
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td align="end">
                                        <div class="d-flex-justify-content-between">
                                            <a href="/admin/customers" class="btn btn-danger btn-sm">
                                                <i class="bi bi-trash"></i>
                                                Suspend Account
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="/admin/customers" class="btn btn-danger">View All Customers
                        <i class="bi bi-eye"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
