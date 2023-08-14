<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 mx-auto max-w-7xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Teachers Card -->
        <a href="{{ route('displayTeacher') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Teacher Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">View Teachers</span>
        </a>

        <!-- Primary Students Card -->
        <a href="{{ route('displayPrimary') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Primary Student Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">View Primary Students</span>
        </a>

        <!-- Secondary Students Card -->
        <a href="{{ route('displaySecondary') }}" class="bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition duration-300 ease-in-out flex items-center justify-center p-6">
            <div class="flex-shrink-0 mr-4">
                <!-- Your icon here -->
                <img src="{{ asset('assets/img/logo-48.png') }}" alt="Secondary Student Icon" class="w-12 h-12">
            </div>
            <span class="text-xl font-semibold">View Secondary Students</span>
        </a>
    </div>
</x-app-layout>
