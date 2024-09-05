@extends('layouts.masterAdmin')

@section('title', 'Edit Open Call')

@section('content')
    <div class="container">
        <h1>Edit Open Call</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('opencalls.update', $opencall) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $opencall->title) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary', $opencall->summary) }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5" required>{{ old('description', $opencall->description) }}</textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="draft" {{ old('status', $opencall->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status', $opencall->status) == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="published_at">Published At</label>
                <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at', $opencall->published_at) }}">
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($opencall->image)
                    <img src="{{ asset('storage/' . $opencall->image->name) }}" alt="{{ $opencall->title }}" width="100" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-success">Update Open Call</button>
            <a href="{{ route('opencalls.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
