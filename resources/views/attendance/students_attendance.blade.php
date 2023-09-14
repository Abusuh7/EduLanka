<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Mark Attendance</h2>

        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf
            @foreach ($students as $student)
                <div class="mb-4">
                    <label for="student_id_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Student:</label>
                    <input type="text" name="attendance[{{ $student->id }}][student_id]" value="{{ $student->id }}" hidden>
                    <p>{{ $student->fname }} {{ $student->lname }}</p>
                </div>

                <div class="mb-4">
                    <label for="attendance_date_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Attendance Date:</label>
                    <input type="date" name="attendance[{{ $student->id }}][attendance_date]" id="attendance_date_{{ $student->id }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                </div>

                <div class="mb-4">
                    <label for="status_{{ $student->id }}" class="block text-sm font-medium text-gray-700">Status:</label>
                    <select name="attendance[{{ $student->id }}][status]" id="status_{{ $student->id }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                        <option value="present">Present</option>
                        <option value="absent">Absent</option>
                    </select>
                </div>
            @endforeach

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Save Attendance
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
