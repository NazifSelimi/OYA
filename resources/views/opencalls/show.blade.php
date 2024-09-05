@extends('layouts.masterAdmin')

@section('title', 'Open Call Details')

@section('content')
    <div class="container">
        <h1>{{ $opencall->title }}</h1>

        <div class="mb-3">
            <strong>Summary:</strong>
            <p>{{ $opencall->summary }}</p>
        </div>

        <div class="mb-3">
            <strong>Description:</strong>
            <p>{!! nl2br(e($opencall->description)) !!}</p>
        </div>

        <div class="mb-3">
            <strong>Status:</strong>
            <p>{{ ucfirst($opencall->status) }}</p>
        </div>

        <div class="mb-3">
            <strong>Published At:</strong>
            <p>{{ $opencall->published_at}}</p>
        </div>

        <div class="mb-3">
            <strong>Image:</strong><br>
            @if($opencall->image)
                <img src="{{ asset('storage/' . $opencall->image->name) }}" alt="{{ $opencall->title }}" width="300">
            @else
                <p>No image available</p>
            @endif
        </div>

        <a href="{{ route('opencalls.index') }}" class="btn btn-secondary">Back to Open Calls</a>
    </div>
@endsection
