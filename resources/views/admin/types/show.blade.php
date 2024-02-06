@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2>Tipologia di progetto: {{ $type->name }}</h2>
        <p>Slug: {{ $type->slug }}</p>

        <hr>
        @if (count($type->projects) > 0)
            <h3>Elenco progetti con questa tipologia:</h3>
            <ul>
                @foreach ($type->projects as $project)
                    <li>
                        <a href="{{ route('admin.projects.show', ['project' => $project->slug]) }}">{{ $project->title }}</a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>Non ci sono progetti con questa tipologia.</p>            
        @endif

    </div>
@endsection