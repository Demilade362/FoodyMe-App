@props(['user'])
<div class="card">
    <div class="card-header">
        <h4 class="mt-2">Profile Information</h4>
    </div>
    <div class="card-body">
        @if (session('info_alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ session('info_alert') }}</span>
            </div>
        @endif
        <p class="text-sm">
            Update your account's profile information and email address.
        </p>
        <form action="{{ route('profile.update.info', auth()->id()) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row align-items-center g-2 mb-3">
                <div class="col-lg-6 text-start">
                    <label for="name" class="col-form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" id="name"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center g-2 mb-3">
                <div class="col-lg-6 text-start">
                    <label for="email" class="col-form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" id="email"
                        class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </form>
    </div>
</div>
