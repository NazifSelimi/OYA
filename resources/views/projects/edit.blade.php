@extends('layouts.masterAdmin')

@section('title', 'Edit Project')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $project->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary', $project->summary) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control rich-text-editor" rows="5" required>{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="planned" {{ old('status', $project->status) == 'planned' ? 'selected' : '' }}>Planned</option>
                    <option value="in-progress" {{ old('status', $project->status) == 'in-progress' ? 'selected' : '' }}>In Progress</option>
                    <option value="completed" {{ old('status', $project->status) == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="start_date">Published At</label>
                <input type="date" name="start_datepublished_at" id="published_at" class="form-control" value="{{ old('published_at', $project->published_at) }}" required>
            </div>


            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($project->image)
                    <img src="{{ asset('storage/' . $project->image->name) }}" alt="{{ $project->title }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Project</button>
            <a href="{{ route('projects.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <style>
        .form-group {
            margin-bottom: 15px;
        }
        .btn-success {
            margin-top: 10px;
        }
    </style>

    <!-- CKEditor Script -->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
        // Initialize CKEditor on the description textarea
        ClassicEditor
            .create(document.querySelector('.rich-text-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
