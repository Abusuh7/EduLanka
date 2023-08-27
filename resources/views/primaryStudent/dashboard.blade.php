<x-app-layout>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Primary Student Dashboard</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@700&display=swap" rel="stylesheet">

        <style>
            .font-acme{
                font-family: 'Acme', sans-serif;
            }
            .font-zen{
                font-family: 'Zen Kaku Gothic New', sans-serif;
            }

        </style>

    </head>

{{--    <body>--}}

{{--    <!-- Navigation Bar -->--}}
{{--    <div class="navigation-bar bg-blue-500 py-4 px-8 flex justify-between items-center">--}}
{{--        <!-- Logo -->--}}
{{--        <a href="#" class="flex items-center">--}}
{{--            <img src="{{ asset('assets/img/logo-48.png') }}" alt="Logo" class="w-8 h-8 mr-2">--}}
{{--            <span class="text-white text-2xl font-semibold font-acme">EDU LANKA</span>--}}
{{--        </a>--}}

{{--        <!-- Navigation Links -->--}}
{{--        <ul class="flex space-x-6">--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center">--}}
{{--                    <button class="bg-blue-100 text-black px-4 py-2 rounded-md hover:bg-blue-200 transition duration-300">Home</button>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center">--}}
{{--                    <button class="bg-gradient-to-r from-indigo-400 to-indigo-600 text-white font-semibold px-4 py-2 rounded-md hover:from-indigo-300 hover:to-indigo-500 transition duration-300">Subjects</button>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <li>--}}
{{--                <a href="#" class="flex items-center">--}}
{{--                    <button class="bg-gradient-to-r from-green-400 to-green-600 text-white font-semibold px-4 py-2 rounded-md hover:from-green-300 hover:to-green-500 transition duration-300">Assignments</button>--}}
{{--                </a>--}}
{{--            </li>--}}
{{--            <!-- Add more navigation links as needed -->--}}
{{--        </ul>--}}
{{--    </div>--}}

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome,') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>



    <!-- Banner Carousel -->
    <div class="banner-carousel">
        {{-- Banner --}}
        <div id="carouselExampleIndicators" class="relative w-full h-[500px]" data-te-carousel-init data-te-ride="carousel">
            <!--Carousel indicators-->
            @if (count($banners) > 0)
                <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                     data-te-carousel-indicators>
                    @foreach ($banners as $key => $banner)
                        <button type="button" data-te-target="#carouselExampleIndicators"
                                data-te-slide-to="{{ $key }}" {{ $key === 0 ? 'data-te-carousel-active' : '' }}
                                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                                aria-label="Slide {{ $key + 1 }}"></button>
                    @endforeach
                </div>
            @endif

            <div class="relative w-full h-[500px] overflow-hidden after:clear-both after:block after:content-['']">
                <!--First item-->
                @if (count($banners) > 0)
                    @foreach ($banners as $key => $banner)
                        <div class="relative float-left -mr-[100%] {{ $key === 0 ? 'w-full' : 'hidden' }} h-[500px] w-full transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                             data-te-carousel-item {{ $key === 0 ? 'data-te-carousel-active' : '' }}>
                            <img src="/storage/{{ $banner->image }}" class="block w-full h-full"
                                 alt="{{ $banner->title }}" />
                            <div
                                class="absolute bottom-0 left-0 w-full h-[100%] bg-black bg-opacity-40 text-white flex flex-col justify-center p-4">
                                <h2 class="text-6xl font-bold mb-2 pl-6">{{ $banner->title }}</h2>
                                <p class="text-2xl pl-6">{{ $banner->caption }}</p>
                                <a href="{{ $banner->link }}"
                                   class="mt-40 ml-5 px-6 py-2 absolute bg-white text-black rounded-full hover:bg-gray-300 transition duration-300">
                                    {{ $banner->button_name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
            </div>
            @else
                {{-- If ther eis banners the below will display --}}
                <div id="carouselExampleIndicators" class="relative h-[500px]" data-te-carousel-init data-te-ride="carousel">
                    <!--Carousel indicators-->
                    <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
                         data-te-carousel-indicators>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="0"
                                data-te-carousel-active
                                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="1"
                                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                aria-label="Slide 2"></button>
                        <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="2"
                                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-[cubic-bezier(0.25,0.1,0.25,1.0)] motion-reduce:transition-none"
                                aria-label="Slide 3"></button>
                    </div>

                    <!--Carousel items-->
                    <div class="relative w-full overflow-hidden  after:clear-both after:block after:content-['']">
                        <!--First item-->
                        <div class="relative float-left -mr-[100%] w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                             data-te-carousel-item data-te-carousel-active>
                            <img src="https://cdn.lyceum.lk/wp-content/uploads/2023/04/DSC05595-scaled.jpg"
                                 class="h-[500px] w-full" alt="Wild Landscape" />
                        </div>
                        <!--Second item-->
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                             data-te-carousel-item>
                            <img src="https://cdn.lyceum.lk/wp-content/uploads/2023/04/V9A1036-scaled.jpg"
                                 class="h-[500px] w-full" alt="Camera" />
                        </div>
                        <!--Third item-->
                        <div class="relative float-left -mr-[100%] hidden w-full transition-transform duration-[600ms] ease-in-out motion-reduce:transition-none"
                             data-te-carousel-item>
                            <img src="https://cdn.lyceum.lk/wp-content/uploads/2023/04/V9A0988-scaled.jpg"
                                 class="h-[500px] w-full" alt="Exotic Fruits" />
                        </div>
                    </div>

                    <!--Carousel controls - prev item-->
                    <button
                        class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button" data-te-target="#carouselExampleIndicators" data-te-slide="prev">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>
                </span>
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Previous</span>
                    </button>
                    <!--Carousel controls - next item-->
                    <button
                        class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-[cubic-bezier(0.25,0.1,0.25,1.0)] hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
                        type="button" data-te-target="#carouselExampleIndicators" data-te-slide="next">
                <span class="inline-block h-8 w-8">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                         stroke="currentColor" class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>
                </span>
                        <span
                            class="!absolute !-m-px !h-px !w-px !overflow-hidden !whitespace-nowrap !border-0 !p-0 ![clip:rect(0,0,0,0)]">Next</span>
                    </button>
                </div>
            @endif
        </div>
    </div>


    <div class="dashboard-container">

        <!-- Introductory Content -->
        <div class="intro-content bg-gradient-to-r from-blue-300 to-blue-600 text-white py-8 px-10 mt-0">
            <p class="text-center text-lg font-semibold mb-2">Welcome to the Learning Management System for Primary Students!</p>
            <p class="text-center text-xl font-acme text-yellow-300">Learn Today, Lead Tomorrow</p>
        </div>

        <!-- Main Content Area -->
        <div class="main-content p-12">


            <!-- Subject Section -->
            <div class="course-tiles grid grid-cols-2 gap-4">
                <h2 class="text-2xl font-zen mt-0 mb-4 p text-blue-500">Start Learning!</h2><br>
                <!-- Course Tile 1 -->
                <a href="#" class="course-tile bg-yellow-200 p-4 shadow-md rounded-md hover:bg-yellow-300 transition duration-300 flex flex-col justify-center items-center">
                    <img src="{{ asset('assets/img/math-image.png') }}" width="55%" alt="Mathematics">
                    <h3 class="text-xl font-semibold text-center">Mathematics</h3>
                </a>

                <!-- Course Tile 2 -->
                <a href="#" class="course-tile bg-blue-200 p-4 shadow-md rounded-md hover:bg-blue-300 transition duration-300 flex flex-col justify-center items-center">
                    <img src="https://th.bing.com/th/id/R.a8d16834ef867af9ba16e418be3a5c36?rik=MYEgb8QrotKD1A&riu=http%3a%2f%2fclipart-library.com%2fdata_images%2f42418.gif&ehk=Tf8HOelopq%2b2inKkdkn8TkToNUzNk6qUnTr%2bMQ1fZN8%3d&risl=&pid=ImgRaw&r=0" width="70%" alt="English Language" class="mb-2">
                    <h3 class="text-xl font-semibold text-center mt-10">English Language</h3>
                </a>

                <!-- Course Tile 3 -->
                <a href="#" class="course-tile bg-green-200 p-4 shadow-md rounded-md hover:bg-green-300 transition duration-300 flex flex-col justify-center items-center">
                    <img src="https://thumbs.dreamstime.com/b/science-chemistry-physics-biology-astronomy-education-subject-doodle-icon-doodle-presenation-title-school-91147329.jpg" alt="Science" class="w-[700px] h-[350px] mb-2">
                    <h3 class="text-xl font-semibold text-center">Science</h3>
                </a>

                <!-- Course Tile 4 -->
                <a href="#" class="course-tile bg-red-200 p-4 shadow-md rounded-md hover:bg-red-300 transition duration-300 flex flex-col justify-center items-center">
                    <img src="https://i1.wp.com/www.churchsidefederation.norfolk.sch.uk/wp-content/uploads/2020/09/geography-banners-stock-illustrations-1505-geog.jpeg?w=800" alt="Geography" class="w-[700px] h-[350px] mb-2">
                    <h3 class="text-xl font-semibold text-center">Geography</h3>
                </a>
            </div>
        </div>





        <div class="grid grid-cols-2 gap-4 p-8 bg-gray-100">
            <!-- Gradebook Access Card -->
            <a href="{{ route('primaryStudentDashboard') }}" class="block bg-white p-6 shadow-md rounded-md hover:bg-blue-100 transition duration-300">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-blue-500 text-white flex items-center justify-center rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-1">Gradebook</h3>
                        <p class="text-gray-700">View your grades and progress</p>
                    </div>
                </div>
            </a>

            <!-- Attendance Access Card -->
            <a href="{{ route('primaryStudentDashboard') }}" class="block bg-white p-6 shadow-md rounded-md hover:bg-green-100 transition duration-300">
                <div class="flex items-center">
                    <div class="w-14 h-14 bg-green-500 text-white flex items-center justify-center rounded-full mr-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-semibold mb-1">Attendance Record</h3>
                        <p class="text-gray-700">Track your attendance history</p>
                    </div>
                </div>
            </a>
        </div>



        <!-- Recent Submissions Section -->
        <div class="assignments w-3/4 p-8">
            <!-- SideBar -->

            <h2 class="text-2xl font-zen mt-8 mb-4 text-blue-500">Recent Submissions</h2>
            <div class="assignments mt-4">
                <!-- Submission 1 -->
                <div class="assignment bg-blue-200 p-4 shadow-md rounded-md">
                    <h3 class="text-lg font-semibold">Math Worksheet</h3>
                    <p class="mt-2 text-gray-700">Due: August 28, 2023</p>
                    <p class="mt-2 text-gray-700">Status: Pending</p> <!-- You can replace "Pending" with actual status -->
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">View Submission</a>
                </div>
                <!-- Submission 2 -->
                <div class="assignment bg-purple-200 p-4 shadow-md rounded-md">
                    <h3 class="text-lg font-semibold">Science Project</h3>
                    <p class="mt-2 text-gray-700">Due: July 25, 2023</p>
                    <p class="mt-2 text-gray-700">Status: Graded (A+)</p> <!-- You can replace "Graded (A+)" with actual status and grade -->
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">View Submission</a>
                </div>
                <!-- Submission 3 -->
                <div class="assignment bg-blue-200 p-4 shadow-md rounded-md">
                    <h3 class="text-lg font-semibold">English Essay</h3>
                    <p class="mt-2 text-gray-700">Due: August 15, 2023</p>
                    <p class="mt-2 text-gray-700">Status: Graded (B)</p>
                    <a href="#" class="mt-4 inline-block text-blue-500 hover:underline">View Submission</a>
                </div>
            </div>
        </div>


    </div>

</x-app-layout>
