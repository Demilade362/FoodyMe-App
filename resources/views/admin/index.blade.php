@extends('admin.layouts.app')

@section('content')
    <div class="content">

        <div class="d-flex align-items-center justify-content-between">
            <div class="header d-lg-block d-flex align-items-center">
                <button class="d-lg-none btn btn-outline-dark me-4" data-bs-toggle="offcanvas" data-bs-target="#sidebar">
                    <i class="bi bi-list"></i>
                </button>
                <h1>Welcome Admin</h1>
            </div>
            <div class="mb-3 d-flex justify-content-between align-items-center">
                <a href="#" class="btn btn-warning rounded-circle shadow-sm">
                    <i class="bi bi-person-fill"></i>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            Orders</h5>
                        <p class="card-text">
                            Lorem ipsum dolor sit amet,
                            consectetur adipiscing
                            elit. Nullam at
                            risus
                            justo.</p>
                        <a href="#" class="btn btn-warning">View Orders
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title placeholder-glow">Products</h5>
                        <p class="card-text placeholder-glow">Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit. Nullam at
                            risus
                            justo.</p>
                        <a href="#" class="btn btn-warning">Add Products
                            <i class="bi bi-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">View Customers</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Company</th>
                                    <th>VAT</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                        <a href="#" class="btn btn-warning">View All Customers
                            <i class="bi bi-eye"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
