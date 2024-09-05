@extends('layouts.masterAdmin')

@section('title', 'Create Open Call')

@section('content')
    <div class="container">
        <h1>Create Open Call</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('opencalls.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" required>
            </div>

            <div class="form-group mb-3">
                <label for="summary">Summary</label>
                <input type="text" name="summary" id="summary" class="form-control" value="{{ old('summary') }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control rich-text-editor" rows="10"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="published_at">Published At</label>
                <input type="date" name="published_at" id="published_at" class="form-control" value="{{ old('published_at') }}">
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 4px;" />
            </div>

            <button type="submit" class="btn btn-success">Create Open Call</button>
            <a href="{{ route('opencalls.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('.rich-text-editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        function previewImage(event) {
            const input = event.target;
            const preview = document.getElementById('imagePreview');

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
