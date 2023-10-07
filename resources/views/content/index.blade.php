<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Content Management') }}
        </h2>
    </x-slot>

    <div class="py-8 mx-auto max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Take Attendance Card -->
        <a href="{{ route('content.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <img src="{{ asset('assets/img/teacher_man_user_avatar_school_icon_209287.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <div>
                <span class="text-xl font-semibold">Create content</span>

            </div>
        </a>

        <!-- View Attendance Card -->
        <a href="{{ route('Teacher.content') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg shadow-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <img src="{{ asset('assets/img/3750020.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <div>
                <span class="text-xl font-semibold">view content</span>

            </div>
        </a>
    </div>
</x-app-layout>
