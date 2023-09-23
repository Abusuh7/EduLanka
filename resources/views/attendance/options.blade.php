<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance Management') }}
        </h2>
    </x-slot>

    <div class="py-8 mx-auto max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Take Attendance Card -->
        <a href="{{ route('attendance.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <img src="{{ asset('assets/img/attendance.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <div>
                <span class="text-xl font-semibold">Take Attendance</span>

            </div>
        </a>

        <!-- View Attendance Card -->
        <a href="{{ route('attendance.view') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <img src="{{ asset('assets/img/edit.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <div>
                <span class="text-xl font-semibold">View Attendance</span>

            </div>
        </a>
    </div>
</x-app-layout>
