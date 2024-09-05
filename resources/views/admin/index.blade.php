@extends('layouts.masterAdmin') <!-- Adjust the layout file path as per your setup -->

@section('title', 'Admin Dashboard')

@section('content')
    <div class="container">
        <h1>Welcome to the Admin Panel</h1>
        <p>Here you can manage projects, news, and open calls.</p>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">Add New Project</a>
        <a href="" class="btn btn-primary">Add New Open Call</a>
        <a href="" class="btn btn-primary">Add New News</a>
    </div>
@endsection
