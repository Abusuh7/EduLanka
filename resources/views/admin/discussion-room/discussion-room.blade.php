<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Discussion Room Bookings') }}
        </h2>

    </x-slot>


    {{-- Ongoing Discussion Room Bookings --}}
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-2xl font-bold">Ongoing Discussion Room Bookings</h1>
            <button type="button"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Create
                    Booking</button>


        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Booking ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Duration</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($bookings as $booking) --}}
                        <tr>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2">
                                {{-- <a href="" class="text-blue-500 hover:text-blue-600">Edit</a> --}}
                                <a href="" class="text-red-500 hover:text-red-600">Terminate Session</a>

                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>


    {{-- Upcoming Discussion Room Bookings --}}
    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-2xl font-bold">Upcoming Discussion Room Bookings</h1>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <table class="table-fixed w-full">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="px-4 py-2 w-20">Booking ID</th>
                            <th class="px-4 py-2">Name</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Phone</th>
                            <th class="px-4 py-2">Date</th>
                            <th class="px-4 py-2">Time</th>
                            <th class="px-4 py-2">Duration</th>
                            <th class="px-4 py-2">Status</th>
                            <th class="px-4 py-2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($bookings as $booking) --}}
                        <tr>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2"></td>
                            <td class="border px-4 py-2">
                                {{-- <a href="" class="text-blue-500 hover:text-blue-600">Edit</a> --}}
                                <a href="" class="text-red-500 hover:text-red-600">Reject Session</a>

                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
