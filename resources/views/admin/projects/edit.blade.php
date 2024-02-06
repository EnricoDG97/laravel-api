@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h2>Modifica i dettagli del progetto {{ $project->title }}</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

        <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-2 has-validation">
                <label for="thumb" class="form-label">Copertina:</label>
                <input type="file" class="form-control @error('thumb') is-invalid @enderror" id="thumb"
                    name="thumb">
                @error('thumb')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-2 has-validation">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $project->title) }}">
            </div>

            <div class="mb-2">
                <label for="type">Seleziona tipologia</label>
                <select class="form-select" name="type_id" id="type">
                    <option @selected(!old('type_id', $project->type_id)) value="">Nessuna tipologia</option>
                    @foreach ($types as $type)
                        <option @selected(old('type_id', $project->type_id) == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-2">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" rows="5" name="description">{{ old('description', $project->description) }}</textarea>
            </div>   
            
            <div class="mb-5">
                <h4>Seleziona le tecnlogie utilizzate in questo progetto:</h4>
                @foreach ($technologies as $technology)
                    <div class="form-check">
                        <input  @checked( $errors->any() ? in_array($technology->id, old('technologies', [])) : $project->technologies->contains($technology)) type="checkbox" id="tag-{{ $technology->id }}" value="{{ $technology->id }}" name="technologies[]">
                        <label for="tag-{{ $technology->id }}">{{ $technology->name }}</label>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-success d-inline-block"> 
                <i class="fa-solid fa-pen-to-square"></i>
            </button>
            
        </form>
    </div>
@endsection