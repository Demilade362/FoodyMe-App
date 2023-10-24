@extends('admin.layouts.app')

@section('content')
    <div class="table-responsive">
        <button class="btn btn-warning mb-4">Create a User
            <i class="bi bi-plus"></i>
        </button>
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
