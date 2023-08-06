<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>



    <div class="py-5 gap-x-6">
        <a href="{{ route('displayTeacher') }}" class="bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
            Teachers
        </a>
        <a href="{{ route('displayPrimary') }}" class="bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
            Primary Students
        </a>
        <a href="{{ route('displaySecondary') }}" class="bg-blue-200 hover:bg-blue-500 text-black font-bold py-2 px-4 rounded">
            Secondary Students
        </a>
    </div>



</x-app-layout>
