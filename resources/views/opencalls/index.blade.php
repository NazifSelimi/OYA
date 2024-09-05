@extends('layouts.masterAdmin')

@section('title', 'All Open Calls')

@section('content')
    <div class="container">
        <h1>All Open Calls</h1>
        <a href="{{ route('opencalls.create') }}" class="btn btn-primary mb-3">Add New Open Call</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Published At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($opencalls as $opencall)
                <tr>
                    <td>{{ $opencall->title }}</td>
                    <td>{{ ucfirst($opencall->status) }}</td>
                    <td>{{ $opencall->published_at}}</td>
                    <td>
                        <a href="{{ route('opencalls.show', $opencall) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('opencalls.edit', $opencall) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('opencalls.destroy', $opencall) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this open call?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
