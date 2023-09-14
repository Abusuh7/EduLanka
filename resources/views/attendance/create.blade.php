<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance baby') }}
        </h2>
    </x-slot>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance baby') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Mark Attendance</h2>

        <!-- Display students and the attendance form -->
        <form method="POST" action="{{ route('attendance.store') }}">
            @csrf
            <table>
                <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->fname }}</td>
                        <td>
                            <input type="checkbox" name="attendance[{{ $student->id }}]" value="1">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                Save Attendance
            </button>
        </form>
    </div>
</x-app-layout>
