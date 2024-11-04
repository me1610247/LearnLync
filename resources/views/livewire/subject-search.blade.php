<div class="mb-4">
    <div class="input-group mb-3">
        <input type="text" wire:model.debounce.300ms="search" class="form-control" placeholder="Search by Subject Name, Code, or Type...">
        <div class="input-group-append">
            <button type="button" class="btn btn-primary" wire:click="clearSearch">
                &times;
            </button>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Type</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($subjects as $subject)
                <tr>
                    <td>{{ $subject->id }}</td>
                    <td>{{ ucfirst($subject->name) }}</td>
                    <td>{{ $subject->code }}</td>
                    <td>{{ $subject->type }}</td>
                    <td>{{ $subject->created_at->format('Y-m-d H:i:s') }}</td>
                    <td>
                        <a class="text-primary" href="{{ route('subject.edit', $subject->id) }}" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a class="text-danger mx-4" href="{{ route('subject.delete', $subject->id) }}" title="Delete" onclick="return confirm('Are you sure you want to delete this subject?');">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No subjects found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div class="mt-4">
        {{ $subjects->links() }}
    </div>
</div>
