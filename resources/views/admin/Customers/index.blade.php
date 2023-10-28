@extends('admin.layouts.app')

@section('content')
    @if (session('msg'))
        <div class="mb-3">
            <div class="alert alert-primary alert-dismissible fade show text-center" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ session('msg') }}</span>
            </div>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="">
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <div class="d-flex-justify-content-between">
                                <button class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                    Suspend Account
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
@endsection
