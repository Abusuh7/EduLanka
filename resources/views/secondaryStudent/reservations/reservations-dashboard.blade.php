<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Reservations') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-center">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <div class="flex justify-center">
                    <a href="{{ route('studentDiscussionRoomSecondary') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Discussion Room Reservation
                    </a>
                </div>
                <div class="flex justify-center mt-5">
                    <a href="" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Books Reservation
                    </a>
                </div>
            </div>
        </div>
    </div>


    {{-- Room Bookings --}}
    <div class="flex justify-center mt-5">
        <h1 class="text-2xl font-bold">Discussion Room Bookings</h1>
    </div>
    <br>
    <div class=" flex justify-center w-full">
        <div class="inline-flex rounded-md shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-blue-200 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-blue-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-blue-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
            role="group">
            <button type="button" id="todayBookingBtn"
                class="inline-block rounded-l bg-blue px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black transition duration-150 ease-in-out hover:bg-blue-500 focus:bg-blue-600 focus:outline-none focus:ring-0 active:bg-blue-700"
                data-te-ripple-init data-te-ripple-color="dark">
                Today
            </button>
            <button type="button" id="upcomingBookingBtn"
                class="inline-block bg-blue px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black transition duration-150 ease-in-out hover:bg-blue-500 focus:bg-blue-600 focus:outline-none focus:ring-0 active:bg-blue-700"
                data-te-ripple-init data-te-ripple-color="light">
                Upcoming
            </button>
            <button type="button" id="pastBookingBtn"
                class="inline-block rounded-r bg-blue px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-black transition duration-150 ease-in-out hover:bg-blue-500 focus:bg-blue-600 focus:outline-none focus:ring-0 active:bg-blue-700"
                data-te-ripple-init data-te-ripple-color="light">
                Past
            </button>
        </div>
    </div>

    {{-- Today Booking Table --}}
    <div class="py-12 hidden" id="todayBookingTable">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($discussionRoomBookingsToday) === 0)
                        <p class="text-center text-lg text-gray-500 py-4">No discussion room bookings for today.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Room
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Start Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        End Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Duration
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($discussionRoomBookingsToday as $discussionRoomBooking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->room_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->date }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->start_time }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->end_time }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            @php
                                                $startTime = \Carbon\Carbon::parse($discussionRoomBooking->start_time);
                                                $endTime = \Carbon\Carbon::parse($discussionRoomBooking->end_time);
                                                $duration = $endTime->diff($startTime)->format('%H:%I');
                                            @endphp
                                            {{ $duration }} Hrs
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->status }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <a href="" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>


    {{-- Upcoming Booking Table --}}
    <div class="py-12 hidden" id="upcomingBookingTable">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($discussionRoomBookingsUpcomming) === 0)
                        <p class="text-center text-lg text-gray-500 py-4">No upcoming discussion room booking.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Room
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Start Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        End Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Duration
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($discussionRoomBookingsUpcomming as $discussionRoomBooking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->room_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->date }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->start_time }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->end_time }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            @php
                                                $startTime = \Carbon\Carbon::parse($discussionRoomBooking->start_time);
                                                $endTime = \Carbon\Carbon::parse($discussionRoomBooking->end_time);
                                                $duration = $endTime->diff($startTime)->format('%H:%I');
                                            @endphp
                                            {{ $duration }} Hrs
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->status }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <a href="" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>

    {{-- Pass booking Table --}}
    <div class="py-12 hidden" id="pastBookingTable">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($discussionRoomBookingsPast) === 0)
                        <p class="text-center text-lg text-gray-500 py-4">No Past discussion room booking.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Room
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Date
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Start Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        End Time
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Duration
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Status
                                    </th>
                                    <th
                                        class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($discussionRoomBookingsPast as $discussionRoomBooking)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->room_name }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->date }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-no-wrap">
                                            <div class="text-sm leading-5 text-gray-900">
                                                {{ $discussionRoomBooking->start_time }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->end_time }}
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            @php
                                                $startTime = \Carbon\Carbon::parse($discussionRoomBooking->start_time);
                                                $endTime = \Carbon\Carbon::parse($discussionRoomBooking->end_time);
                                                $duration = $endTime->diff($startTime)->format('%H:%I');
                                            @endphp
                                            {{ $duration }} Hrs
                                        </td>

                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            {{ $discussionRoomBooking->status }}
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                            <a href="" class="ml-2 text-red-600 hover:text-red-900">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
