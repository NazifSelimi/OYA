@extends('layouts.master')

@section('title', 'All News and Open Calls')

@section('content')
    <section id="news" class="news-section">
        <div class="news-header">
            <h2>All News and Open Calls</h2>
        </div>

        @include('display-card', ['items' => $openCalls]) <!-- Pass the news collection -->
    </section>
@endsection
