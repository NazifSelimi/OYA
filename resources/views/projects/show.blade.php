@extends('layouts.masterAdmin')

@section('title', 'Project Details')

@section('content')
    <div class="container">
        <h1>{{ $project->title }}</h1>

        <div class="mb-3">
            <strong>Description:</strong>
            <div class="description-box">
                {!! $project->description !!}
            </div>
        </div>

        <div class="mb-3">
            <strong>Image:</strong><br>
            @if($project->image)
                <img src="{{ asset('storage/' . $project->image->name) }}" alt="{{ $project->title }}" width="300">
            @else
                <p>No image available</p>
            @endif
        </div>

        <div class="mb-3">
            <strong>Status:</strong>
            <p>{{ ucfirst($project->status) }}</p>
        </div>

        <div class="mb-3">
            <strong>Published At:</strong>
            <p>{{ $project->published_at}}</p>
        </div>


        <div class="mb-3">
            <strong>Summary:</strong>
            <p>{{ $project->summary }}</p>
        </div>

        <div class="mb-3">
            <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit Project</a>
            <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete Project</button>
            </form>
        </div>

        <a href="{{ route('projects.index') }}" class="btn btn-secondary">Back to Projects</a>
    </div>

    <style>
        .description-box {
            max-height: 150px;
            overflow-y: auto; /* Makes the box scrollable */
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
            margin-top: 10px;
        }
    </style>
@endsection
