<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Primary Students List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($primaryStudents) === 0)
                        <p class="text-center text-lg text-gray-500 py-4">No primary students enrolled.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Name
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Role
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th class="px-6 py-3 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($primaryStudents as $primaryStudent)
                                <tr>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <img class="h-10 w-10 rounded-full bg-gray-100"
                                                     src="storage/app/public/{{ $primaryStudent->profile_photo_path }}" alt="">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm leading-5 font-medium text-gray-900">{{ $primaryStudent->name }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="text-sm leading-5 text-gray-900">{{ ucwords($primaryStudent->role) }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap">
                                        <div class="@if ($primaryStudent->status === 'deactivated') text-red-500 @else text-green-500 @endif">
                                            {{ ucwords($primaryStudent->status) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5 font-medium">
                                        <a href="{{ route('studentProfile', $primaryStudent->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900">View Profile</a>
                                        <a href="{{ route('editStudentProfile', $primaryStudent->id) }}"
                                           class="ml-2 text-indigo-600 hover:text-indigo-900">Edit</a>
                                        @if ($primaryStudent->status === 'deactivated')
                                            <a href="{{ route('activateStudent', $primaryStudent->id) }}"
                                               class="ml-2 text-green-600 hover:text-green-900">Activate</a>
                                        @else
                                            <a href="{{ route('deactivateStudent', $primaryStudent->id) }}"
                                               class="ml-2 text-red-600 hover:text-red-900">Deactivate</a>
                                        @endif
                                        <a href=""
                                           class="ml-2 text-red-600 hover:text-red-900">Terminate</a>
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
