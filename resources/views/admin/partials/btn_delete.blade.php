<div class="d-inline-block">
    <form action="{{ route('admin.archived.destroy', ['archived' => $project->slug]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" data-title="{{ $project->title }}" class="btn btn-danger btn-delete"><i class="fa-solid fa-trash-can"></i></button>
    </form>
</div>