<div class="card my-5">
    <div class="card-header">
        <h4 class="mt-2">Delete Account</h4>
    </div>
    <div class="card-body">
        @error('password_delete')
            <div class="alert alert-danger mb-4 alert-dismissible fade show" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <span>{{ $message }}</span>
            </div>
        @enderror
        <p class="text-sm">
            Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting
            your account, please download any data or information that you wish to retain.
        </p>
        <button class="btn btn-danger text-uppercase text-sm fwt-bold" data-bs-toggle="modal" data-bs-target="#modalId">
            <i class="bi bi-trash"></i>
            Delete Account</button>
    </div>
</div>
</div>



<!-- Modal -->
<div class="modal fade center" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Are you sure you want to delete your account?</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    Once your account is deleted, all of its resources and data will be permanently deleted. Please
                    enter your password to confirm you would like to permanently delete your account.
                </div>
                <form action="{{ route('profile.destroy', auth()->id()) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="password" name="password_delete"
                        class="form-control @error('password_delete') is-invalid @enderror my-3" placeholder="Password">
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-danger">
                            <i class="bi bi-trash"></i>
                            Delete Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
