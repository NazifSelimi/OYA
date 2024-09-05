@extends('layouts.master')

@section('title', 'Open Call Details - OYA')

@push('styles')
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px 50px;
        }

        h1 {
            text-align: center;
            font-size: 32px;
            color: #274f5c;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .news-project-card {
            display: flex;
            flex-direction: column;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .news-project-card:hover {
            transform: translateY(-5px);
        }

        .news-project-card img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .card-content {
            padding: 20px;
            text-align: left; /* Ensure text is aligned to the start */
            word-wrap: break-word; /* Breaks long words to fit within the container */
            overflow-wrap: break-word; /* Allows text to wrap within the container */
        }

        .card-content h2 {
            font-size: 24px;
            color: #f05227;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: left; /* Align title to the start */
        }

        .card-content p {
            font-size: 16px;
            color: #555;
            line-height: 1.6;
            text-align: left; /* Align all paragraphs to the start */
            word-wrap: break-word; /* Breaks long words to fit within the container */
            overflow-wrap: break-word; /* Allows text to wrap within the container */
            word-break: break-word; /* Breaks words at the edge of the container */
        }

        .back-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #f05227;
            color: #fff;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background 0.3s, transform 0.3s;
            text-align: center;
        }

        .back-button:hover {
            background-color: #d43c5a;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            .news-project-card img {
                height: 200px;
            }

            .card-content {
                padding: 15px;
            }

            .back-button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
@endpush

@section('content')
    <div class="container">
        <h1>Open Call Details</h1>

        <!-- Display the detailed open call card -->
        <div class="news-project-card">
            <img src="{{ asset('storage/'.$openCall->image->name) }}" alt="{{ $openCall->title }}" />
            <div class="card-content">
                <h2>{{ $openCall->title }}</h2>
                <p>
                    {!! $openCall->description !!}
                </p>
                <p>
                    <!-- Additional content such as status and published date -->
                    <strong>Status:</strong> {{ ucfirst($openCall->status) }}<br>
                    <strong>Published At:</strong> {{ $openCall->published_at }}<br>
                </p>
            </div>
        </div>

        <!-- Back button to navigate to previous page or section -->
        <a href="{{ route('openCalls') }}" class="back-button">Back to Open Calls</a>
    </div>
@endsection
