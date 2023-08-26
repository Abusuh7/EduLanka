<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banner Preview') }}
        </h2>
    </x-slot> --}}


    {{-- Banner --}}
    <div id="carouselExampleIndicators" class="relative w-full h-[500px]" data-te-carousel-init data-te-ride="carousel">
        <!--Carousel indicators-->
        <div class="absolute bottom-0 left-0 right-0 z-[2] mx-[15%] mb-4 flex list-none justify-center p-0"
            data-te-carousel-indicators>
            <!-- ... (indicator buttons) ... -->
            {{-- <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="0" data-te-carousel-active
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="1"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                aria-label="Slide 2"></button>
            <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="2"
                class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                aria-label="Slide 3"></button> --}}
            @foreach ($banners as $key => $banner)
                <button type="button" data-te-target="#carouselExampleIndicators" data-te-slide-to="{{ $key }}"
                    {{ $key === 0 ? 'data-te-carousel-active' : '' }}
                    class="mx-[3px] box-content h-[3px] w-[30px] flex-initial cursor-pointer border-0 border-y-[10px] border-solid border-transparent bg-white bg-clip-padding p-0 -indent-[999px] opacity-50 transition-opacity duration-[600ms] ease-in-out motion-reduce:transition-none"
                    aria-label="Slide {{ $key + 1 }}"></button>
            @endforeach
        </div>

        <!--Carousel items-->
        {{-- <div class="relative w-full h-[400px] overflow-hidden after:clear-both after:block after:content-['']">
            <!--First item-->
            <div class="relative float-left -mr-[100%] w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item data-te-carousel-active>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full h-full" alt="Wild Landscape" />
            </div>
            <!--Second item-->
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full h-full" alt="Camera" />
            </div>
            <!--Third item-->
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full h-full" alt="Exotic Fruits" />
            </div>
        </div> --}}

        {{-- <div class="relative w-full h-[400px] overflow-hidden after:clear-both after:block after:content-['']">
            <!--First item-->
            <div class="relative float-left -mr-[100%] w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item data-te-carousel-active>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full h-full" alt="Wild Landscape" />
                <div class="absolute bottom-2/4 left-5 p-4 text-white">
                    <h2 class="text-3xl font-bold">Banner Title</h2>
                    <p class="text-sm">Banner Caption goes here.</p>
                </div>
            </div>
            <!-- ... (other items) ... -->
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full h-full" alt="Wild Landscape" />
                <div class="absolute bottom-2/4 left-5 p-4 text-white">
                    <h2 class="text-3xl font-bold">Banner Title</h2>
                    <p class="text-sm">Banner Caption goes here.</p>
                </div>
            </div>
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
            data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full h-full" alt="Wild Landscape" />
                <div class="absolute bottom-2/4 left-5 p-4 text-white">
                    <h2 class="text-3xl font-bold">Banner Title</h2>
                    <p class="text-sm">Banner Caption goes here.</p>
                </div>
            </div>

        </div> --}}

        <div class="relative w-full h-[500px] overflow-hidden after:clear-both after:block after:content-['']">
            <!--First item-->
            @foreach ($banners as $key => $banner)
                <div class="relative float-left -mr-[100%] {{ $key === 0 ? 'w-full' : 'hidden' }} h-[500px] w-full transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                    data-te-carousel-item {{ $key === 0 ? 'data-te-carousel-active' : '' }}>
                    <img src="/storage/{{ $banner->image }}" class="block w-full h-full" alt="{{ $banner->title }}" />
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
            {{-- <div class="relative float-left -mr-[100%] w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item data-te-carousel-active>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="block w-full h-full"
                    alt="Wild Landscape" />
                <div
                    class="absolute bottom-0 left-0 w-full h-[100%] bg-black bg-opacity-40 text-white flex flex-col justify-center p-4">
                    <h2 class="text-6xl font-bold mb-2 pl-6">Banner Title</h2>
                    <p class=" text-2xl pl-6">Banner Caption goes here.</p>
                    <button type="button"
                        class=" mt-40 ml-5 px-6 py-2 absolute bg-white text-black rounded-full hover:bg-gray-300 transition duration-300">
                        Learn More
                    </button>
                </div>
            </div>
            <!-- ... (other items) ... -->
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="block w-full h-full"
                    alt="Wild Landscape" />
                <div
                    class="absolute bottom-0 left-0 w-full h-[100%] bg-black bg-opacity-40 text-white flex flex-col justify-center p-4">
                    <h2 class="text-6xl font-bold mb-2 pl-6">Banner Title</h2>
                    <p class="text-2xl pl-6">Banner Caption goes here.</p>
                    <button type="button"
                        class=" mt-40 ml-5 px-6 py-2 absolute bg-white text-black rounded-full hover:bg-gray-300 transition duration-300">
                        Learn More
                    </button>
                </div>
            </div>
            <div class="relative float-left -mr-[100%] hidden w-full h-[400px] transition-transform duration-[400ms] ease-in-out motion-reduce:transition-none"
                data-te-carousel-item>
                <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="block w-full h-full"
                    alt="Wild Landscape" />
                <div
                    class="absolute bottom-0 left-0 w-full h-[100%] bg-black bg-opacity-40 text-white flex flex-col justify-center p-4">
                    <h2 class="text-6xl font-bold mb-2 pl-6">Banner Title</h2>
                    <p class="text-2xl pl-6">Banner Caption goes here.</p>
                    <button type="button"
                        class=" mt-40 ml-5 px-6 py-2 absolute bg-white text-black rounded-full hover:bg-gray-300 transition duration-300">
                        Learn More
                    </button>
                </div>
            </div> --}}
        </div>

        {{-- <!--Carousel controls - prev item-->
        <button
            class="absolute bottom-0 left-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-in-out hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselExampleIndicators" data-te-slide="prev">
            <!-- ... (previous button) ... -->
        </button>
        <!--Carousel controls - next item-->
        <button
            class="absolute bottom-0 right-0 top-0 z-[1] flex w-[15%] items-center justify-center border-0 bg-none p-0 text-center text-white opacity-50 transition-opacity duration-150 ease-in-out hover:text-white hover:no-underline hover:opacity-90 hover:outline-none focus:text-white focus:no-underline focus:opacity-90 focus:outline-none motion-reduce:transition-none"
            type="button" data-te-target="#carouselExampleIndicators" data-te-slide="next">
            <!-- ... (next button) ... -->
        </button> --}}
    </div>

     {{-- Banner Form --}}
     <div class="container hidden w-2/4 mx-auto px-4 py-4 border" id="bannerCreateForm">
        <div class="flex flex-col">
            <div class="container flex justify-between">
                <div class="flex flex-row justify-between items-center">
                    <h2 class="text-2xl font-bold">Create Banner</h2>

                </div>
                <button id="closeFormButton" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

            </div>


            <div class="flex flex-col mt-4">
                <form action="{{ route('bannerCreate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col">
                        <label for="title" class="text-sm text-gray-500">Title</label>
                        <input type="text" name="title" id="title"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Title" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="caption" class="text-sm text-gray-500">Caption</label>
                        <input type="text" name="caption" id="caption"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Caption" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="image" class="text-sm text-gray-500">Image</label>
                        <input type="file" name="image" id="image"
                            class="border border-gray-300 rounded-md p-2 mt-2" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="button_name" class="text-sm text-gray-500">Button Name</label>
                        <input type="text" name="button_name" id="button_name"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Button" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="link" class="text-sm text-gray-500">Link</label>
                        <input type="text" name="link" id="link"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Link" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="visibility" class="text-sm text-gray-500">Visibility</label>
                        <select name="visibility" id="visibility" class="border border-gray-300 rounded-md p-2 mt-2"
                            required>
                            <option value="primarystu">Primary Students Only</option>
                            <option value="secondarystu">Secondary Students Only</option>
                            <option value="bothstu">Students Only</option>
                            <option value="teacher">Teachers Only</option>
                            <option value="all">All</option>
                        </select>
                    </div>


                    <div class="flex flex-col mt-4">
                        <label for="status" class="text-sm text-gray-500">Status</label>
                        <select name="status" id="status" class="border border-gray-300 rounded-md p-2 mt-2"
                            required>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="flex flex-col mt-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create
                            Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Existing Banners Table --}}
    <div class="container w-full mx-auto px-4 py-4">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between items-center">
                <h2 class="text-2xl font-bold">Existing Banners</h2>
                <button type="button" id="bannerCreateBtn"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create
                    Banner</button>
            </div>
            <div class="flex flex-col mt-4">
                <table class="min-w-full border border-gray-300 divide-y divide-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left font-semibold">Title</th>
                            <th class="px-4 py-3 text-left font-semibold">Caption</th>
                            <th class="px-4 py-3 text-left font-semibold">Button</th>
                            <th class="px-4 py-3 text-left font-semibold">Link</th>
                            <th class="px-4 py-3 text-left font-semibold">Status</th>
                            <th class="px-4 py-3 text-left font-semibold">Action</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-300">
                        @foreach ($all as $banner)
                            <tr>
                                <td class="px-4 py-3">{{ $banner->title }}</td>
                                <td class="px-4 py-3">{{ $banner->caption }}</td>
                                <td class="px-4 py-3">{{ $banner->button_name }}</td>
                                <td class="px-4 py-3">{{ $banner->link }}</td>
                                <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-md
                                        @if ($banner->status == 'active')
                                            bg-green-500 text-white
                                        @else
                                            bg-red-500 text-white
                                        @endif">
                                        {{ ucfirst($banner->status) }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 flex space-x-2">
                                    @if ($banner->status == 'active')
                                        <a href="{{ route('deactivateBanner', $banner->id) }}" class="flex items-center bg-yellow-500 text-white px-3 py-2 rounded-md hover:bg-yellow-600 transition duration-300">Deactivate</a>
                                    @else
                                        <a href="{{ route('activateBanner', $banner->id) }}" class="flex items-center bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Activate</a>
                                    @endif
                                    <a href="{{ route('editBanner', $banner->id) }}" class="flex items-center bg-blue-500 text-white px-3 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit</a>
                                    <a href="{{ route('deleteBanner', $banner->id) }}" class="flex items-center bg-red-500 text-white px-3 py-2 rounded-md hover:bg-red-600 transition duration-300">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>






</x-app-layout>
