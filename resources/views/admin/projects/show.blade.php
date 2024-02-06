@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>{{ $project->title }}</h2>

        <div class="mt-4">
            Slug: {{ $project->slug }}
        </div>

        @if ($project->thumb)
            <div class="mt-4">
                <img src="{{ asset('storage/' . $project->thumb) }}" alt="">
            </div>
        @else
            <p>Nessuna copertina disponibile.</p>
        @endif

        <div>
            <h5>Tipologia:</h5> 
            {{ $project->type ? $project->type->name : 'Nessuna tipologia assegnata' }}
        </div>

        <p class="mt-4">
            <h5>Descrizione:</h5>
            {{ $project->description }}
        </p>

        <p>Tecnologie utilizzate nel progetto:</p>
        @if ($project->technologies)
            <ul>
                @foreach ($project->technologies as $technology)
                    <li>{{ $technology->name }}</li>
                @endforeach
            </ul>
        @else
            Nessuna tecnologia utilizzata
        @endif

        <div>
            <a class="btn btn-warning d-inline-block"
                href="{{ route('admin.projects.edit', ['project' => $project->slug]) }}">
                <i class="fa-solid fa-pen-to-square"></i>
            </a>
        </div>
    </div>


@endsection
