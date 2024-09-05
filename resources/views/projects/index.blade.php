@extends('layouts.masterAdmin')

@section('title', 'Projects')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Add New Project</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td>{{ $project->title }}</td>
                    <td>{{ Str::limit($project->description, 50) }}</td>
                    <td>
                            <img src="{{ asset('storage/' . $project->image->name) }}" alt="{{ $project->title }}" width="100">
                    </td>
                    <td>
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('projects.edit', $project) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('projects.destroy', $project) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
