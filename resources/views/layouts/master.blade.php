<!-- resources/views/layouts/master.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Organized Youth Association')</title>
    <style>
        /* Add your global CSS styles here */
        body {
            margin: 0;
            padding: 0;
            font-family: "Arial", sans-serif;
            background-color: #f9f9fb;
            color: #040404;
            scroll-behavior: smooth;
            overflow-x: hidden;
            position: relative;
        }

        a {
            text-decoration: none;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Add other shared styles here */
    </style>
    @stack('styles') <!-- Stack for additional styles -->

    @vite('resources/css/style.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body>
<header>
    <div class="header-container">
        <div class="logo">
            <a href="{{ route('main.index') }}">
                <img src="{{ asset('images/logo.png') }}" alt="OYA Logo">
            </a>
        </div>
        <nav class="nav-links">
            <a href="{{ url('/') }}">Home</a>
            <a href="#about-us" data-target="about-us" class="nav-link">About</a>
            <a href="#news" data-target="news" class="nav-link">News and Open Calls</a>
            <a href="#projects" data-target="projects" class="nav-link">Projects</a>
            <a href="{{ route('contact.index') }}" class="nav-link">Contact</a>
            <a href="#home-care" data-target="home-care" class="right-logo nav-link">
                <img src="{{ asset('images/HomeCarelogo-01.png') }}"  alt="Home Care Logo" class="right-logo-img">
            </a>
        </nav>
        <div class="burger-menu" onclick="toggleSideMenu()">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</header>
<!-- Side Modal Structure -->
<div id="side-menu" class="side-modal">
    <div class="side-modal-content">
        <span class="close" onclick="toggleSideMenu()">&times;</span>
        <nav class="side-nav-links">
            <a href="{{ url('/') }}">
                <i class="fas fa-home"></i> Home
            </a>
            <a href="#about-us" data-target="about-us" class="nav-link">
                <i class="fas fa-info-circle"></i> About
            </a>
            <a href="#news" data-target="news" class="nav-link">
                <i class="fas fa-newspaper"></i> News and Open Calls
            </a>
            <a href="#projects" data-target="projects" class="nav-link">
                <i class="fas fa-briefcase"></i> Projects
            </a>
            <a href="{{ route('contact.index') }}" class="nav-link">
                <i class="fas fa-envelope"></i> Contact
            </a>
        </nav>
        <!-- Logo positioned at the bottom -->
        <div class="bottom-logo">
            <img src="{{ asset('images/HomeCarelogo-01.png') }}" alt="Home Care Logo" class="right-logo-img">
        </div>
    </div>
</div>


<div class="background-shapes">
    <!-- Include shapes here as in your original HTML -->
    <div class="shape shape-1"></div>
    <div class="shape shape-2"></div>
    <div class="shape shape-3"></div>
    <div class="shape shape-4"></div>
    <div class="shape shape-5"></div>
    <div class="shape-outline outline-circle"></div>
    <div class="shape-outline outline-square"></div>
    <div class="shape-outline outline-triangle"></div>
</div>

<main>
    @yield('content') <!-- Section for the main content -->
</main>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="{{ asset('images/logo.png') }}" alt="OYA Logo">
        </div>
        <div class="footer-links">
            <ul>
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><a href="#">Product</a></li>
                <li><a href="#">Pricing</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
        <div class="footer-social">
            <a href="#"><img src="{{ asset('images/instagram.png') }}" alt="Instagram"></a>
            <a href="#"><img src="{{ asset('images/facebook.png') }}" alt="Facebook"></a>
        </div>
    </div>
    <div class="footer-bottom">
        <p>&copy; {{ date('Y') }} Organized Youth Association. All rights reserved.</p>
    </div>
</footer>

<script>
    window.addEventListener("scroll", function () {
        const header = document.querySelector("header");
        if (window.scrollY > 50) {
            header.classList.add("scrolled");
        } else {
            header.classList.remove("scrolled");
        }
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navLinks = document.querySelectorAll(".nav-link");

        navLinks.forEach(link => {
            link.addEventListener("click", function (event) {
                const href = this.getAttribute('href');
                const targetSection = this.getAttribute('data-target');

                // Check if the link has a data-target attribute for internal scrolling
                if (targetSection) {
                    event.preventDefault();
                    // Check if current path is home
                    if (window.location.pathname !== '/') {
                        // Redirect to home with section anchor
                        window.location.href = `/${'#' + targetSection}`;
                    } else {
                        // If already on home, scroll to the section
                        const targetElement = document.getElementById(targetSection);
                        if (targetElement) {
                            targetElement.scrollIntoView({ behavior: 'smooth' });
                        }
                    }
                } else {
                    // Allow default action for links without data-target (e.g., Contact page)
                    if (href && href !== "#") {
                        window.location.href = href;
                    }
                }
            });
        });
    });

</script>

<style>
    /* Side Modal styles */
    .side-modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1003; /* On top of other content */
        top: 0;
        right: 0;
        width: 0; /* Initially hidden */
        height: 100%; /* Full height */
        background-color: rgba(0, 0, 0, 0.8); /* Black with opacity */
        overflow-x: hidden; /* Disable horizontal scroll */
        transition: width 0.3s ease; /* Smooth transition */
    }

    .side-modal.active {
        display: block; /* Show the modal */
        width: 250px; /* Expand to the defined width */
    }

    .side-modal-content {
        position: absolute;
        top: 0;
        right: 0;
        width: 250px; /* Set width of the side menu */
        height: 100%; /* Full height */
        background: white;
        padding: 20px;
        box-sizing: border-box; /* Include padding in width */
        display: flex;
        flex-direction: column; /* Display items in a column */
        align-items: flex-start; /* Align items to the start */
        background-color: #fff; /* Keep it light as per your current design */
    }

    .close {
        align-self: flex-end; /* Align close button to the right */
        font-size: 24px; /* Slightly smaller close icon */
        cursor: pointer;
        margin-bottom: 20px;
    }

    .side-nav-links {
        display: flex;
        flex-direction: column; /* Display nav items in a column */
        width: 100%; /* Take full width */
        padding-left: 0; /* Align items with no extra padding */
        margin: 0; /* Remove default margins */
    }

    .side-nav-links a {
        display: flex;
        align-items: center; /* Center items vertically */
        margin: 10px 0; /* Consistent spacing between items */
        padding: 10px 15px; /* Add padding to make items look like buttons */
        color: #333;
        text-decoration: none;
        font-size: 16px; /* Smaller font size */
        border-bottom: 1px solid #ddd; /* Subtle divider between items */
        width: 100%; /* Ensure full width for clickable area */
        box-sizing: border-box; /* Include padding in width */
    }

    .side-nav-links a i {
        margin-right: 15px; /* Space between icon and text */
        font-size: 16px; /* Adjust icon size */
    }

    .right-logo-img {
        height: 100px;
    }
</style>
<script>
    function toggleSideMenu() {
        const sideMenu = document.getElementById('side-menu');
        sideMenu.classList.toggle('active'); // Toggle the 'active' class to show/hide the modal
    }

    // Close the modal when clicking outside of the modal content (optional)
    window.onclick = function(event) {
        const sideMenu = document.getElementById('side-menu');
        if (event.target === sideMenu) {
            sideMenu.classList.remove('active');
        }
    }

    // Close the modal when a nav link is clicked
    document.querySelectorAll('.side-nav-links a').forEach(link => {
        link.addEventListener('click', () => {
            document.getElementById('side-menu').classList.remove('active');
        });
    });
</script>

@stack('scripts') <!-- Stack for additional scripts -->
@vite('resources/js/app.js')

</body>
</html>
