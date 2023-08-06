<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers List') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 border-4">

            <ul role="list" class="divide-y divide-gray-100">


                    @foreach ($teachers as $teacher)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="storage/app/public/{{ $teacher->profile_photo_path }}"
                                    alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $teacher->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $teacher->email }}</p>
                                    </p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{ ucwords($teacher->role) }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time
                                        datetime="2023-01-23T13:23Z">3h
                                        ago</time></p>
                            </div>
                        </li>
                    @endforeach

                    {{-- @foreach ($primaryStudents as $primaryStudent)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="storage/app/public/{{ $primaryStudent->profile_photo_path }}"
                                    alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $primaryStudent->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $primaryStudent->email }}</p>
                                    </p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{ ucwords($primaryStudent->role) }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time
                                        datetime="2023-01-23T13:23Z">3h
                                        ago</time></p>
                            </div>
                        </li>
                    @endforeach

                    @foreach ($secondaryStudents as $secondaryStudent)
                        <li class="flex justify-between gap-x-6 py-5">
                            <div class="flex min-w-0 gap-x-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="storage/app/public/{{ $secondaryStudent->profile_photo_path }}"
                                    alt="">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $secondaryStudent->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $secondaryStudent->email }}</p>
                                    </p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                <p class="text-sm leading-6 text-gray-900">{{ ucwords($secondaryStudent->role) }}</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time
                                        datetime="2023-01-23T13:23Z">3h
                                        ago</time></p>
                            </div>
                        </li>
                    @endforeach --}}



            </ul>
        </div>
    </div>



</x-app-layout>
