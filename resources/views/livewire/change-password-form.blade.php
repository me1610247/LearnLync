<div>
    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="updatePassword">
        <div class="form-group">
            <label for="old_password">Current Password</label>
            <input type="password" wire:model.defer="old_password" class="form-control" placeholder="Enter Current Password">
            @error('old_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" wire:model.defer="new_password" class="form-control" placeholder="Enter New Password">
            @error('new_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" wire:model.defer="confirm_password" class="form-control" placeholder="Confirm New Password">
            @error('confirm_password') <p class="text-danger">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
