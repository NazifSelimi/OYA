@extends('layouts.master')

@section('title', 'All Projects')

@section('content')
    <section id="projects" class="news-section">
        <div class="news-header">
            <h2>All Projects</h2>

        </div>

        @include('display-card', ['items' => $projects]) <!-- Pass the projects collection -->
    </section>
@endsection
