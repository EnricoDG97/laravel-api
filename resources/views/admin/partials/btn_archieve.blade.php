<div class="d-inline-block">
    <form action="{{ route('admin.projects.destroy', ['project' => $project->slug]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" data-title="{{ $project->title }}" class="btn btn-danger btn-archieve"><i class="fa-solid fa-file-zipper"></i></i></button>
    </form>
</div>
