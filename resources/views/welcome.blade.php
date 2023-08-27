<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EduLanka - Empowering Education</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <style>
        /* Add custom styles for smooth section transitions */
        .fade-enter-active,
        .fade-leave-active {
            transition: opacity 0.5s ease-in-out;
        }
        .fade-enter, .fade-leave-to {
            opacity: 0;
        }
    </style>

</head>
<body class="bg-center bg-cover bg-fixed">

<header class="sticky top-0 transition-transform duration-300 transform translate-y-0 bg-opacity-90 bg-gray-900 text-white">
<!-- Navigation Bar -->
<div class="bg-gray-900 text-white">
    <div class="container mx-auto px-7 py-4 flex items-center justify-between">
        <a href="/" class="logo relative">
            <img src="{{ asset('assets/img/favicon.png') }}" alt="Logo" width="250" class="rounded-full border-2 border-white p-2">
            <div class="hidden absolute bg-gray-800 text-white py-2 px-4 rounded-full shadow-lg transition-opacity opacity-0 group-hover:opacity-100">
            </div>
        </a>
        <nav class="flex items-center space-x-6">
            <a href="#home" class="hover:text-gray-300">Home</a>
            <a href="#key-features" class="hover:text-gray-300">Features</a>
            <a href="#our-team" class="hover:text-gray-300">Our Team</a>
            <a href="#our-team" class="hover:text-gray-300">Pricing</a>
            <a href="#" class="hover:text-gray-300">Contact Us</a>
        </nav>
        <div class="flex items-center space-x-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/redirects') }}" class="font-semibold text-gray-600 hover:text-gray-900 focus:outline focus:outline-2 focus:rounded-sm focus:ring-1 focus:ring-gray-600">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="font-semibold text-gray-400 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:ring-1 focus:ring-red-500">Log in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="font-semibold text-gray-400 hover:text-gray-600 focus:outline focus:outline-2 focus:rounded-sm focus:ring-1 focus:ring-red-500">Register</a>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</div>
</header>

<!-- Hero Section -->
<div id="home" class="bg-gradient-to-b from-blue-900 to-blue-400 py-20 opacity-0 transform translate-y-8">
    <div class="container mx-auto px-7">
        <div class="text-center">
            <h1 class="text-4xl font-semibold mb-4 text-white">Welcome to EduLanka</h1>
            <p class="text-lg text-gray-300 mb-8">Empowering Primary and Secondary Education</p>
            <a href="#" class="bg-white hover:bg-gray-300 text-blue-500 font-semibold py-2 px-6 rounded">Get Started</a>
        </div>
    </div>
</div>


<!-- About Section -->
<div class="container mx-auto px-7 py-10 opacity-0 transform translate-y-8">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <div class="md:pr-10">
            <h2 class="text-2xl font-semibold mb-4">About EduLanka</h2>
            <p class="text-gray-700 text-lg leading-relaxed">
                EduLanka is a modern and user-friendly learning management system designed to cater to the needs of primary and
                secondary schools. With a focus on interactive learning, collaborative tools, and comprehensive resources, we provide a platform that enhances the education experience for students and teachers alike.
            </p>
            <h3 class="text-xl font-semibold mt-8">Our Mission</h3>
            <p class="text-gray-700 text-lg leading-relaxed">
                Our mission at EduLanka is to empower educators and students with innovative technology and tools that foster an engaging and effective learning environment. We are committed to enabling personalized learning experiences, promoting collaboration, and preparing students for success in the digital age.
            </p>
        </div>
        <div class="md:pl-10">
            <img src="{{ asset('assets/img/about-image.png') }}"  alt="About EduLanka" class="w-full rounded-lg shadow-lg">
        </div>
    </div>
</div>

<!-- Features Section -->
<div id="key-features" class="bg-gradient-to-b from-blue-400 to-blue-600 py-20 opacity-0 transform translate-y-8">
    <div class="container mx-auto px-7">
        <h2 class="text-3xl font-semibold text-white text-center mb-10">Key Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">Interactive Learning</h3>
                <p class="text-gray-700">
                    Engage students with interactive lessons and activities that promote active participation and deeper understanding.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">Collaborative Tools</h3>
                <p class="text-gray-700">
                    Foster teamwork and communication among students and teachers with collaborative tools for projects and discussions.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">Discussion Room Reservation</h3>
                <p class="text-gray-700">
                    Empower students to reserve discussion rooms for collaborative learning, group projects, and meetings.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">Attendance Marking/Tracking</h3>
                <p class="text-gray-700">
                    Streamline attendance tracking and marking, providing teachers and administrators with real-time attendance insights.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">News Banner</h3>
                <p class="text-gray-700">
                    Keep students, teachers, and parents informed about school events, announcements, and news through dynamic news banners.
                </p>
            </div>
            <div class="p-6 rounded-lg shadow-md bg-white">
                <h3 class="text-xl font-semibold mb-2">ECA Enrollment</h3>
                <p class="text-gray-700">
                    Allow students to easily enroll in extra-curricular activities, fostering participation and engagement in school clubs and events.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="h-1 bg-gray-300"></div>

<!-- Team Section -->
<div id="our-team" class="bg-gray-100 py-20 opacity-0 transform translate-y-8">
    <div class="container mx-auto px-7">
        <h2 class="text-3xl font-semibold text-gray-900 text-center mb-10">Meet Our Team</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-5 gap-8">
            <!-- Product Owner -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/img/product-owner.png') }}" alt="Product Owner" class="w-full h-full object-cover">
                </div>
                <p class="text-center mt-4 font-semibold text-lg">Product Owner</p>
            </div>
            <!-- Scrum Master -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/img/product-owner.png') }}" alt="Scrum Master" class="w-full h-full object-cover">
                </div>
                <p class="text-center mt-4 font-semibold text-lg">Scrum Master</p>
            </div>
            <!-- Developer -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/img/product-owner.png') }}" alt="Developer" class="w-full h-full object-cover">
                </div>
                <p class="text-center mt-4 font-semibold text-lg">Developer</p>
            </div>
            <!-- Business Analyst -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/img/product-owner.png') }}" alt="Business Analyst" class="w-full h-full object-cover">
                </div>
                <p class="text-center mt-4 font-semibold text-lg">Business Analyst</p>
            </div>
            <!-- QA Engineer -->
            <div class="flex flex-col items-center">
                <div class="w-32 h-32 rounded-full overflow-hidden shadow-md bg-white flex items-center justify-center">
                    <img src="{{ asset('assets/img/product-owner.png') }}" alt="QA Engineer" class="w-full h-full object-cover">
                </div>
                <p class="text-center mt-4 font-semibold text-lg">QA Engineer</p>
            </div>
        </div>
    </div>
</div>

<div class="h-1 bg-gray-300"></div>

<!-- Call to Action -->
<div class="bg-blue-600 py-20 text-center">
    <div class="container mx-auto px-7">
        <h2 class="text-3xl font-semibold text-white mb-4">Join EduLanka Today!</h2>
        <p class="text-lg text-white mb-8">Experience a new era of education with our innovative learning platform. Sign up now to empower your students and teachers with cutting-edge tools and resources.</p>
        <a href="#" class="bg-white hover:bg-gray-200 text-blue-600 font-semibold py-2 px-6 rounded">Get Started</a>
    </div>
</div>


<!-- Scroll to Top Button -->
<button id="scrollToTopBtn" class="fixed bottom-6 right-6 bg-blue-500 text-white rounded-full p-2 shadow-md hover:bg-blue-700 transition-all duration-300 hidden" aria-label="Scroll to top">
    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
    </svg>
</button>

<script>
    const scrollToTopButton = document.getElementById('scrollToTopBtn');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 500) {
            scrollToTopButton.classList.remove('hidden');
        } else {
            scrollToTopButton.classList.add('hidden');
        }
    });

    scrollToTopButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>

<script>
    const sections = document.querySelectorAll('.opacity-0');

    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.remove('opacity-0', 'transform', 'translate-y-8');
            }
        });
    });

    sections.forEach(section => {
        observer.observe(section);
    });
</script>


<!-- Footer Section -->
<footer class="bg-gray-900 text-white py-10">
    <div class="container mx-auto px-7">
        <p class="text-center">Copyright © 2023 EduLanka. All rights reserved.</p>
    </div>
</footer>

</body>
</html>

