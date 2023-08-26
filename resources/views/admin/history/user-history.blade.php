<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History') }}
        </h2>
    </x-slot>

    <div class="py-8 mx-auto max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Teachers Card -->
        <a href="{{ route('displayTerminatedTeacher') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Teacher Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">Teachers History</span>
        </a>

        <!-- Primary Students Card -->
        <a href="{{ route('displayTerminatedPrimary') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">Primary Students History</span>
        </a>

        <!-- Secondary Students Card -->
        <a href="{{ route('displayTerminatedSecondary') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Secondary Student Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">Secondary Students History</span>
        </a>
    </div>
</x-app-layout>
