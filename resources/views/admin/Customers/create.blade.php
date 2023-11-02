@extends('admin.layouts.app')

@section('content')
    <div class="row  align-items-center">
        <div class="col">
            <form action="{{ route('admin.customers.store') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" placeholder="John Doe" name="name"
                        class="form-control mb-3 @error('name') is-invalid @enderror" id="name"
                        value="{{ old('name') }}" />
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control mb-3 @error('email') is-invalid @enderror"
                        placeholder="Johndoe123@email.com" id="email" value="{{ old('email') }}" />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control mb-3 @error('password') is-invalid @enderror"
                        id="password" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">Confirm Password</label>
                    <input type="password" name="password_confirmation"
                        class="form-control mb-3 @error('password_confirmation') is-invalid @enderror"
                        id="password_confirmation" />
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-warning col-12 my-3">Create Customer
                    <i class="bi bi-plus"></i>
                </button>
            </form>
        </div>
    </div>
@endsection
