<div class="news-cards">
    @foreach($items as $item)
        <div class="news-card">
            <img src="{{ asset('storage/'.$item->image->name) }}" alt="{{ $item->title }}" />
            <div class="news-card-content">
                <h3>{{ $item->title }}</h3>
                <p>
                    {{ Str::limit(strip_tags($item->summary ?? $item->description), 150, '...') }}
                </p>
                <div class="news-card-footer">
                    <span>{{ $item->published_at}}</span>
                    <a href="{{ route($item instanceof App\Models\Project ? 'projects.show-main' : 'openCall.show-main', $item) }}" class="read-more">
                        Read more
                    </a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<style>
    .news-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
    }

    .news-card {
        width: 300px; /* Set a fixed width for the cards */
        height: 400px; /* Set a fixed height for the cards */
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
    }

    .news-card:hover {
        transform: translateY(-5px);
    }

    .news-card img {
        width: 100%;
        height: 200px; /* Set a fixed height for the images */
        object-fit: cover; /* Ensures the image covers the area while keeping aspect ratio */
    }

    .news-card-content {
        padding: 15px;
        flex: 1; /* Allows the content area to grow to fill the card */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: inherit; /* Maintain the card’s original background */
    }

    .news-card-content h3 {
        font-size: 20px;
        color: #f05227;
        margin-bottom: 10px;
    }

    .news-card-content p {
        font-size: 14px;
        color: #555;
        line-height: 1.4;
        flex-grow: 1; /* Makes the paragraph take up remaining space */
    }

    .news-card-footer {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .news-card-footer span {
        font-size: 12px;
        color: #888;
    }

    .read-more {
        color: #f05227;
        text-decoration: none;
        font-weight: bold;
    }

    .read-more:hover {
        text-decoration: underline;
    }
</style>
