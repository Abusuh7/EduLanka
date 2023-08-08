<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Secondary Students List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-4">
            <ul role="list" class="divide-y divide-gray-100">
                @if (count($secondaryStudents) === 0)
                    <p class="text-center text-lg text-gray-500 py-4">No secondary students enrolled.</p>
                @else
                @foreach ($secondaryStudents as $secondaryStudent)
                        <!-- Your existing teacher display code here -->
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="storage/app/public/{{ $secondaryStudent->profile_photo_path }}" alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $secondaryStudent->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $secondaryStudent->email }}</p>
                                    </p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{ ucwords($secondaryStudent->role) }}</p>
                                <b>
                                    <p class="mt-1 text-sm leading-5">
                                        Account Status :
                                        <time datetime="2023-01-23T13:23Z"
                                            class="@if ($secondaryStudent->status === 'deactivated') text-red-500 @else text-green-500 @endif">
                                            {{ ucwords($secondaryStudent->status) }}
                                        </time>
                                    </p>
                                </b>
                            </div>
                            <div class="hidden md:flex md:items-center md:space-x-4">
                                <a href="{{ route('studentProfile', $secondaryStudent->id) }}}"
                                    class="text-sm leading-5 font-medium text-gray-900 hover:text-gray-400 transition ease-in-out duration-150">
                                    View Profile
                                </a>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <a href="{{ route('editStudentProfile', $secondaryStudent->id) }}" class="text-sm leading-6 text-gray-900">Edit</a>

                                @if ($secondaryStudent->status === 'deactivated')
                                    <a href="{{ route('activateStudent', $secondaryStudent->id) }}"
                                        class="text-sm leading-6 ">Activate</a>
                                @else
                                    <a href="{{ route('deactivateStudent', $secondaryStudent->id) }}"
                                        class="text-sm leading-6">Deactivate</a>
                                @endif

                                <a href="" class="text-sm leading-6 text-gray-900">Terminate</a>
                            </div>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>

</x-app-layout>
