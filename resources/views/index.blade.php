<!-- resources/views/index.blade.php -->
@extends('layouts.master')

@section('title', 'Home | Organized Youth Association')

@section('content')
    <section class="hero" id="home" style="background: url('{{ asset('images/provafoto.jpg') }}') no-repeat center center; background-size: cover;">
        <div class="overlay"></div>
        <div class="hero-content">
            <h1>Your Imagination Is Your Only Limit</h1>
            <p>Join us in making a difference. Explore our activities and get involved with the youth community.</p>
            <a href="#about-us" class="cta-button">Discover More</a>
        </div>
        <div class="bottom-fade"></div>
    </section>

    <!-- About Us Section -->
    <section id="about-us" class="about-us">
        <div class="about-us-container">
            <div class="about-us-content">
                <h3>Know About Us</h3>
                <h2>Organized Youth Association - OYA</h2>
                <p>
                    OYA is dedicated to empowering young people by fostering active
                    participation, activism, and volunteerism across various critical
                    areas. We strive to create opportunities for youth to engage
                    meaningfully in their communities through youth activism in fields
                    like environmental activism, digitalization, and promoting mental
                    and physical health care.
                </p>
                <div class="more-text">
                    <p>
                        Our mission includes standing up against social injustices like
                        corruption, preventing violence, advancing youth rights, and
                        ensuring that young people can freely and without prejudice
                        contribute to society. By also engaging in policymaking, we
                        envision a peaceful world where youth collaborate harmoniously,
                        building a transparent, just, and sustainable future. Through our
                        initiatives, we aim to encourage civic engagement and cultivate a
                        generation of leaders committed to integrity, social justice, and
                        the well-being of their communities.
                    </p>
                    <div class="mission-vision">
                        <h4>Mission:</h4>
                        <p>
                            To encourage youth participation, activism, and volunteerism,
                            empowering young people to take an active role in shaping their
                            communities and standing up against social injustices.
                        </p>
                        <h4>Vision:</h4>
                        <p>
                            A peaceful world where young people have the opportunity to
                            engage freely and without prejudice in society, working together
                            in complete harmony with others to build a just and transparent
                            future.
                        </p>
                    </div>
                </div>
                <a href="#" class="cta-button" onclick="toggleText(event)"
                >Read More</a
                >
            </div>
            <div class="about-us-slideshow about-us-slideshow1">
                <img src="{{ asset('images/dog.jpg') }}" class="slide active" alt="About Us 1">
                <img src="{{ asset('images/eco.jpg') }}" class="slide" alt="About Us 2">
                <img src="{{ asset('images/group.jpg') }}" class="slide" alt="About Us 3">
                <img src="{{ asset('images/hand.jpg') }}" class="slide" alt="About Us 4">
            </div>
        </div>
    </section>
    <!-- News and Projects Section -->
    <section id="news" class="news-section">
        <div class="news-header">
            <h2>News and Open Calls!</h2>
            <a href="{{ route('openCalls') }}" class="all-projects-button">View All</a> <!-- Add the View All button -->
        </div>
        <div class="news-cards">
            @foreach($openCalls as $opencall)
                <div class="news-card">
                    <img src="{{asset('storage/'.$opencall->image->name) }}" alt="{{ $opencall->title }}">
                    <div class="news-card-content">
                        <h3>{{ $opencall->title }}</h3>
                        <p>{{ Str::limit(strip_tags($opencall->summary), 150, '...') }}</p>
                        <div class="news-card-footer">
                            <span>{{ $opencall->formattedPublishedAt }}</span>
                            <a href="{{ route('openCall.show-main', $opencall) }}" class="read-more">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="team-section">
        <h2>Team</h2>
        <div class="team-grid">
            <div class="team-member">
                <img src="{{url('/images/Art Spahiu - President.jpg')}}" alt="Art Spahiu" />
                <h3>Art Spahiu</h3>
                <p>President</p>
            </div>
            <div class="team-member">
                <img src="{{url('/images/Bekim Jashari - Vice President.png')}}" alt="Bekim Jashari" />
                <h3>Bekim Jashari</h3>
                <p>Vice President</p>
            </div>
            <div class="team-member">
                <img src="{{url('/images/Florent Maskuti - General Secretary.jpg')}}" alt="Florent Maskuti" />
                <h3>Florent Maksuti</h3>
                <p>General Secretary</p>
            </div>
            <div class="team-member">
                <img src="{{url('/images/Manushaqe Abdiu - Human Resources.webp')}}" alt="Manushaqe Abdiu" />
                <h3>Manushaqe Abdiu</h3>
                <p>Human Resources</p>
            </div>
            <div class="team-member">
                <img src="{{url('/images/Mirlind Muaremi - IT.jpg')}}" alt="Mirlind Muaremi" />
                <h3>Mirlind Muaremi</h3>
                <p>Internet Technologies</p>
            </div>
        </div>
    </section>
    <style>
        .team-section {
            position: relative;
            padding: 30px 10px;
            overflow: hidden; /* Keeps content within bounds */
        }

        .team-grid {
            display: flex;
            gap: 20px;
            padding: 10px;
            overflow-x: auto; /* Enables horizontal scrolling */
            scroll-snap-type: x mandatory; /* Adds snap effect for better UX */
            -webkit-overflow-scrolling: touch; /* Smooth scrolling on touch devices */
            scrollbar-width: none; /* Hide scrollbar on Firefox */
        }

        .team-grid::-webkit-scrollbar {
            display: none; /* Hide scrollbar for WebKit browsers */
        }

        .team-member {
            flex: 0 0 auto;
            width: 150px;
            text-align: center;
            scroll-snap-align: start; /* Snap each item to start */
        }

        .team-member img {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #f05227;
        }

        .team-member h3 {
            font-size: 14px;
            margin-top: 8px;
        }

        .team-member p {
            font-size: 12px;
        }
    </style>

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
    <!-- Add more sections as needed -->
    <section id="projects" class="news-section">
        <div class="news-header">
            <h2>Our Projects</h2>
            <a href="{{ route('projects') }}" class="all-projects-button">View All</a> <!-- Add the All Projects button -->
        </div>
        <div class="news-cards">
            @foreach($projects as $project)
                <div class="news-card">
                    <img src="{{ asset('storage/'.$project->image->name) }}" alt="{{ $project->title }}" />
                    <div class="news-card-content">
                        <h3>{{ $project->title }}</h3>
                        <p>
                            {{ Str::limit(strip_tags($project->summary), 150, '...') }}
                        </p>
                        <div class="news-card-footer">
                            <span>{{ $project->formattedPublishedAt}}</span>
                            <a href="{{ route('projects.show-main', $project) }}" class="read-more">Read more</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <style>
        .news-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
        }

        .all-projects-button {
            position: absolute;
            right: 0;
            top: 0;
            padding: 10px 20px;
            background-color: #f05227;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, transform 0.3s;
            font-weight: bold;
        }

        .all-projects-button:hover {
            background-color: #d43c5a;
            transform: scale(1.05);
        }
    </style>


    <section id="home-care" class="about-us">
        <div class="about-us-container">
            <div class="about-us-content">
                <h3>Know About Home Care</h3>
                <h2>Home Care - OYA</h2>
                <p>
                    Organized Youth Association is now a licensed provider of Home Care services, aimed at supporting elderly people over 65, individuals with disabilities, and those with reduced functional capacity.
                </p>
                <div class="more-text">
                    <p>
                        The goal of this service is to help meet the daily needs of elderly individuals, improving their quality of life and preventing or delaying the need for institutional care.

                        This service provides up to 80 hours of assistance per month with basic and instrumental daily activities for elderly and disabled individuals who cannot care for themselves independently.
                    </p>
                    <p>
                        The beneficiaries of this service are residents of Gostivar and Vrapčište municipalities, and they will be served by 20 trained, professional, and certified caregivers.

                        Importantly, this service is offered free of charge to users. It is established as part of the Social Services Improvement Project under the Ministry of  Social Policy, Demography and Youth, with support from the World Bank.
                    </p>
                </div>
                <a href="#" class="cta-button" onclick="toggleText(event)"
                >Read More</a
                >
            </div>
            <div class="about-us-slideshow about-us-slideshow2">
                <img src="{{ asset('images/dog.jpg') }}" class="slide active" alt="About Us 1">
                <img src="{{ asset('images/eco.jpg') }}" class="slide" alt="About Us 2">
                <img src="{{ asset('images/group.jpg') }}" class="slide" alt="About Us 3">
                <img src="{{ asset('images/hand.jpg') }}" class="slide" alt="About Us 4">
            </div>
        </div>
    </section>
@endsection
<script>

    function toggleText(event) {
        event.preventDefault(); // Prevents the default anchor behavior
        const button = event.currentTarget; // Selects the clicked button
        const moreText = button
            .closest(".about-us-content")
            .querySelector(".more-text"); // Selects the text within the same section

        if (moreText.classList.contains("show")) {
            moreText.classList.remove("show");
            button.textContent = "Read More";
        } else {
            moreText.classList.add("show");
            button.textContent = "Show Less";
        }
    }
    document.addEventListener("DOMContentLoaded", function () {
        const slides = document.querySelectorAll(".about-us-slideshow1 .slide");
        let currentSlide = 0;

        function showNextSlide() {
            slides[currentSlide].classList.remove("active");
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add("active");
        }

        setInterval(showNextSlide, 3000); // Change slide every 3 seconds
    });
    document.addEventListener("DOMContentLoaded", function () {
        const slides = document.querySelectorAll(".about-us-slideshow2 .slide");
        let currentSlide = 0;

        function showNextSlide() {
            slides[currentSlide].classList.remove("active");
            currentSlide = (currentSlide + 1) % slides.length;
            slides[currentSlide].classList.add("active");
        }

        setInterval(showNextSlide, 3000); // Change slide every 3 seconds
    });
</script>

</script>
