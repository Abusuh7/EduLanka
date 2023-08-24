<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers Dashboard') }}
        </h2>
    </x-slot>


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

</x-app-layout>
