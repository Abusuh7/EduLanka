<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Mark Attendance</h2>

        <!-- Class Dropdown -->
        <div class="mb-4">
            <label for="class_id" class="block text-sm font-medium text-gray-700">Class:</label>
            <select name="class_id" id="class_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                <option value="">Select Class</option>
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Grade Dropdown -->
        <div class="mb-4">
            <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade:</label>
            <select name="grade_id" id="grade_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                <option value="">Select Grade</option>
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                @endforeach
            </select>
        </div>

        <!-- "Go" Button to Load Students -->
        <div class="mb-4">
            <button type="button" id="load-students" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                Go
            </button>
            <a href="{{ route('attendance.options') }}" class="ml-4 text-sm text-gray-600 hover:underline">Back</a>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Add an event listener to the "Go" button
            document.getElementById('load-students').addEventListener('click', function () {
                const selectedClass = document.getElementById('class_id').value;
                const selectedGrade = document.getElementById('grade_id').value;

                // Redirect to the students attendance page with selected class and grade as query parameters
                window.location.href = `/admin/students-attendance?class_id=${selectedClass}&grade_id=${selectedGrade}`;
            });
        });
    </script>
</x-app-layout>
