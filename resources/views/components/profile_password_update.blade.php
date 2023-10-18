<div class="card mt-5">
    <div class="card-header">
        <h4 class="mt-2">Update Password</h4>
    </div>
    <div class="card-body">
        @if (session('password_alert'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ session('password_alert') }}</span>
            </div>
        @endif
        <p class="text-sm">
            Ensure your account is using a long, random password to stay secure.
        </p>
        <form action="{{ route('profile.update.pass', auth()->id()) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row align-items-center g-2 mb-3">
                <div class="col-lg-6 text-start">
                    <label for="current_password" class="col-form-label">Current Password</label>
                    <input type="password" name="current_password" id="current_password"
                        class="form-control @error('current_password') is-invalid @enderror">
                    @error('current_password')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center g-2 mb-3">
                <div class="col-lg-6 text-start">
                    <label for="password" class="col-form-label">Password</label>
                    <input type="password" name="password" id="password"
                        class="form-control @error('password') is-invalid @enderror">
                    @error('password')
                        <p class="invalid-feedback" role="alert">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row align-items-center g-2 mb-3">
                <div class="col-lg-6 text-start">
                    <label for="password_confirmation" class="col-form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation "
                        class="form-control @error('password') is-invalid @enderror">
                </div>
            </div>
            <div>
                <button type="submit" class="btn btn-dark text-uppercase">Save</button>
            </div>
        </form>
    </div>
</div>
