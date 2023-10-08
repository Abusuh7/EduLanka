<x-app-layout>
    <head>
        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdn.tailwindcss.com"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Zen+Kaku+Gothic+New:wght@700&display=swap" rel="stylesheet">

        <style>
            .font-acme {
                font-family: 'Acme', sans-serif;
            }

            .font-zen {
                font-family: 'Zen Kaku Gothic New', sans-serif;
            }

            /* Add some light and cool background colors to the content cards */
            .bg-cool-blue {
                background-color: #E4F4FA;
            }

            .bg-cool-green {
                background-color: #E6FAF3;
            }

            .bg-cool-yellow {
                background-color: #FCF3E4;
            }
        </style>
    </head>

    <x-slot name="header">
        <h2 class="font-zen text-xl text-gray-800 leading-tight">
            {{ __('Welcome,') }} {{ Auth::user()->name }}
        </h2>
    </x-slot>

    {{-- Carousel --}}
    <div id="carouselExampleIndicators" class="relative w-full h-[500px]" data-te-carousel-init data-te-ride="carousel">
        <!-- Carousel indicators -->
        @if (count($banners) > 0)
            <div
                class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
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
            <!-- Carousel items -->
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
            <!-- If there are no banners, you can add a default content here -->
            <div class="relative h-[500px]">
                <div class="flex items-center justify-center h-full bg-gray-200">
                    <p class="text-2xl font-bold text-gray-600">No banners available</p>
                </div>
            </div>
        @endif
    </div>

    {{-- Additional Content as Buttons --}}
    <div class="container mx-auto p-4 mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Content Cards as Buttons -->
            <a href="{{ route('content.index') }}"
               class="bg-cool-blue shadow-md rounded-lg p-4 border border-blue-300 block hover:bg-blue-100">
                <h3 class="text-lg font-medium text-blue-600">Content Management</h3>
                <p class="mt-2 text-gray-700">Manage content and publish into the system</p>
            </a>

            <a href="{{ route('attendance.index') }}"
               class="bg-cool-green shadow-md rounded-lg p-4 border border-green-300 block hover:bg-green-100">
                <h3 class="text-lg font-medium text-green-600">Mark Attendance</h3>
                <p class="mt-2 text-gray-700">Efficiently track attendance records.</p>
            </a>

            <a href="{{ route('marks.index') }}"
               class="bg-cool-yellow shadow-md rounded-lg p-4 border border-yellow-300 block hover:bg-yellow-100">
                <h3 class="text-lg font-medium text-yellow-600">Student Grade Book</h3>
                <p class="mt-2 text-gray-700">Manage and update student grade information.</p>
            </a>

            <a href="{{ route('teacherReservations') }}"
               class="bg-cool-purple shadow-md rounded-lg p-4 border border-purple-300 block hover:bg-purple-100">
                <h3 class="text-lg font-medium text-purple-600">Discussion Room Reservation</h3>
                <p class="mt-2 text-gray-700">Reserve discussion rooms for meetings and collaborations.</p>
            </a>
        </div>
    </div>
</x-app-layout>
