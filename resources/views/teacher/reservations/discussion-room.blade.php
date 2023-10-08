<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussion Room Booking') }}
        </h2>
    </x-slot>

    {{--
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif --}}
    @if (isset($success))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-md mb-4">
            {{ $success }}
        </div>
    @endif


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 m-12">
        {{-- First Card --}}
        <div class="bg-white rounded-lg shadow-lg dark:bg-neutral-700">
            <div class="relative overflow-hidden">
                <img class="h-30 w-full object-cover rounded-t-lg" src="{{asset('assets/img/discussion room.jpeg')}}" alt="Room Image">
                <a href="#" class="absolute bottom-0 left-0 right-0 top-0 h-full w-full bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></a>
            </div>
            <div class="bg-sky-950 p-6">
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                    Discussion Room 1
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    Facilities:
                </p>
                <ul class="mb-4 text-sm list-disc list-inside text-neutral-600 dark:text-neutral-300">
                    <li>Number of chairs: 10</li>
                    <li>Smartboard: Yes</li>
                    <li>Computers: 5</li>
                    <li>Glassboard: No</li>
                    <li>Audio System: Available</li>
                    <!-- Add other facilities here -->
                </ul>
                <div class="mb-4 text-sm">
                    <span class="text-neutral-600 dark:text-neutral-300">Availability:</span>
                    <span class="text-green-500">Available</span>
                </div>
                <button type="button" id="discussionRoom1Btn" class="inline-block rounded bg-yellow-200 px-6 py-2 text-xs font-medium uppercase text-black shadow-md transition duration-150 ease-in-out hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-blue-300 dark:hover:shadow">
                    Book Now
                </button>
            </div>
        </div>

        {{-- Second Card --}}
        <div class="bg-white rounded-lg shadow-lg dark:bg-neutral-700">
            <div class="relative overflow-hidden">
                <img class="h-30 w-full object-cover rounded-t-lg" src="{{asset('assets/img/discussion room.jpeg')}}" alt="Room Image">
                <a href="#" class="absolute bottom-0 left-0 right-0 top-0 h-full w-full bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></a>
            </div>
            <div class="bg-sky-950 p-6">
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                    Discussion Room 2
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    Facilities:
                </p>
                <ul class="mb-4 text-sm list-disc list-inside text-neutral-600 dark:text-neutral-300">
                    <li>Number of chairs: 8</li>
                    <li>Smartboard: Yes</li>
                    <li>Computers: 2</li>
                    <li>Glassboard: No</li>
                    <li>Audio System: Available</li>
                    <!-- Add other facilities here -->
                </ul>

                <div class="mb-4 text-sm">
                    <span class="text-neutral-600 dark:text-neutral-300">Availability:</span>
                    <span class="text-green-500">Available</span>
                </div>
                <button type="button" id="discussionRoom2Btn" class="inline-block rounded bg-yellow-200 px-6 py-2 text-xs font-medium uppercase text-black shadow-md transition duration-150 ease-in-out hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-blue-300 dark:hover:shadow">
                    Book Now
                </button>
            </div>
        </div>

        {{-- Third Card --}}
        <div class="bg-white rounded-lg shadow-lg dark:bg-neutral-700">
            <div class="relative overflow-hidden">
                <img class="h-30 w-full object-cover rounded-t-lg" src="{{asset('assets/img/discussion room.jpeg')}}" alt="Room Image">
                <a href="#" class="absolute bottom-0 left-0 right-0 top-0 h-full w-full bg-[hsla(0,0%,98%,0.15)] bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-100"></a>
            </div>
            <div class="bg-sky-950 p-6">
                <h5 class="mb-2 text-xl font-medium text-neutral-800 dark:text-neutral-50">
                    Discussion Room 3
                </h5>
                <p class="mb-4 text-base text-neutral-600 dark:text-neutral-200">
                    Facilities:
                </p>
                <ul class="mb-4 text-sm list-disc list-inside text-neutral-600 dark:text-neutral-300">
                    <li>Number of chairs: 5</li>
                    <li>Smartboard: No</li>
                    <li>Computers: 1</li>
                    <li>Glassboard: Yes</li>
                    <li>Audio System: Unavailable</li>
                    <!-- Add other facilities here -->
                </ul>

                <div class="mb-4 text-sm">
                    <span class="text-neutral-600 dark:text-neutral-300">Availability:</span>
                    <span class="text-green-500">Available</span>
                </div>
                <button type="button" id="discussionRoom3Btn" class="inline-block rounded bg-yellow-200 px-6 py-2 text-xs font-medium uppercase text-black shadow-md transition duration-150 ease-in-out hover:bg-yellow-300 focus:outline-none focus:ring focus:ring-blue-300 dark:hover:shadow">
                    Book Now
                </button>
            </div>
        </div>
    </div>



    {{-- Forms for the discussion room 1 reservation --}}
    <div class="max-w-md mx-auto mt-8 p-6 border border-gray-300 rounded-lg shadow-md hidden" id="discussionRoom1form">
        <div class="flex justify-end">
            <button type="button" class="text-gray-600 hover:text-gray-800 transition duration-300 focus:outline-none"
                    id="closeDiscussionForm1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M4.293 5.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <form action="{{ route('CreateRoomBookingSecondary') }}" method="POST" class="mt-6">
            @csrf
            <!-- ... (rest of your form fields) ... -->
            <div>
                <label for="room_name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="room_name" id="room_name" autocomplete="room_name" value="Room1" readonly
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                <input type="text" name="capacity" id="capacity" autocomplete="capacity" placeholder="1-10" required
                       min="1" max="10"
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" autocomplete="date" placeholder="10" required
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="start_time" id="start_time" autocomplete="start_time" placeholder="10"
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="time" name="end_time" id="end_time" autocomplete="end_time" placeholder="10"
                       required required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            {{-- <div class="mt-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" autocomplete="status" placeholder="Comes From DB" required readonly
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div> --}}


            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-sky-950 text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>


    {{-- Forms for the discussion room 2 reservation --}}
    <div class="max-w-md mx-auto mt-8 p-6 border border-gray-300 rounded-lg shadow-md hidden"
         id="discussionRoom2form">
        <div class="flex justify-end">
            <button type="button"
                    class="text-gray-600 hover:text-gray-800 transition duration-300 focus:outline-none"
                    id="closeDiscussionForm2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M4.293 5.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <form action="{{ route('CreateRoomBookingSecondary') }}" method="POST" class="mt-6">
            @csrf
            <!-- ... (rest of your form fields) ... -->
            <div>
                <label for="room_name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="room_name" id="room_name" autocomplete="room_name" value="Room2"
                       readonly required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                <input type="number" name="capacity" id="capacity" autocomplete="capacity" placeholder="1-5"
                       required min="1" max="5"
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>



            <div class="mt-6">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" autocomplete="date" placeholder="10" required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="start_time" id="start_time" autocomplete="start_time" placeholder="10"
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="time" name="end_time" id="end_time" autocomplete="end_time" placeholder="10"
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            {{-- <div class="mt-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" autocomplete="status" placeholder="Available" required readonly
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div> --}}


            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-sky-950 text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>
        </form>
    </div>


    {{-- Forms for the discussion room 3 reservation --}}
    <div class="max-w-md mx-auto mt-8 p-6 border border-gray-300 rounded-lg shadow-md hidden"
         id="discussionRoom3form">
        <div class="flex justify-end">
            <button type="button"
                    class="text-gray-600 hover:text-gray-800 transition duration-300 focus:outline-none"
                    id="closeDiscussionForm3">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                          d="M4.293 5.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                          clip-rule="evenodd" />
                </svg>
            </button>
        </div>

        <form action="{{ route('CreateRoomBookingSecondary') }}" method="POST" class="mt-6">
            @csrf
            <!-- ... (rest of your form fields) ... -->
            <div>
                <label for="room_name" class="block text-sm font-medium text-gray-700">Room Name</label>
                <input type="text" name="room_name" id="room_name" autocomplete="room_name" value="Room3"
                       readonly required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="capacity" class="block text-sm font-medium text-gray-700">Capacity</label>
                <input type="text" name="capacity" id="capacity" autocomplete="capacity" placeholder="1-3"
                       required min="1" max="3"
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="date" class="block text-sm font-medium text-gray-700">Date</label>
                <input type="date" name="date" id="date" autocomplete="date" placeholder="10" required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
                <input type="time" name="start_time" id="start_time" autocomplete="start_time" placeholder="10"
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            <div class="mt-6">
                <label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
                <input type="time" name="end_time" id="end_time" autocomplete="end_time" placeholder="10"
                       required
                       class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div>

            {{-- <div class="mt-6">
                <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                <input type="text" name="status" id="status" autocomplete="status" placeholder="Available" required readonly
                    class="mt-1 focus:ring-primary-500 focus:border-primary-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            </div> --}}


            <div class="mt-6">
                <button type="submit"
                        class="w-full bg-sky-950 text-white px-6 py-2 rounded-md text-sm font-medium hover:bg-primary-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Submit
                </button>
            </div>

        </form>
    </div>




</x-app-layout>
