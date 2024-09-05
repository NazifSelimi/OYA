@extends('layouts.masterAdmin')

@section('title', 'Add New Project')

@section('content')
    <div class="container">
        <h1>Add New Project</h1>
        <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="summary">Summary</label>
                <input type="text" id="summary" name="summary" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" class="form-control rich-text-editor" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" class="form-control" required>
                    <option value="planned">Planned</option>
                    <option value="in-progress">In Progress</option>
                    <option value="completed">Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="start_date">Published At</label>
                <input type="date" id="published_at" name="published_at" class="form-control" required>
            </div>

            <div class="form-group mb-3">
                <label for="image">Image</label>
                <input type="file" name="image" id="image" class="form-control" onchange="previewImage(event)">
                <img id="imagePreview" src="#" alt="Image Preview" style="display: none; margin-top: 10px; max-width: 100%; height: auto; border: 1px solid #ddd; border-radius: 4px;" />
            </div>

            <button type="submit" class="btn btn-primary">Add Project</button>
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
