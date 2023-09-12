@php
    global $students;
    global $classes;
    global $grades;
@endphp
<x-app-layout>


    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance baby') }}
        </h2>
    </x-slot>




    @section('content')
        <div class="container mx-auto p-4">
    <h2 class="text-2xl font-semibold mb-4">Mark Attendance</h2>
    <form method="post" action="{{ route('attendance.store') }}">
        @csrf
        <!-- Class Dropdown -->
        <div class="mb-4">
            <label for="class_id" class="block text-sm font-medium text-gray-700">Class:</label>
            <select name="class_id" id="class_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                <option value="">Select Class</option>


                @if(isset($classes) && count($classes) > 0)

                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>


                    @endforeach
                @else
                    <p>No classes found.</p>
                @endif

            </select>
        </div>

        <!-- Grade Dropdown -->
        <div class="mb-4">
            <label for="grade_id" class="block text-sm font-medium text-gray-700">Grade:</label>
            <select name="grade_id" id="grade_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                <option value="">Select Grade</option>
                @if(isset($grades) && count($grades) > 0)
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                @else
                    <p>No grades found.</p>
                @endif


            </select>
        </div>

        <div class="mb-4">
            <label for="attendance_date" class="block text-sm font-medium text-gray-700">Date:</label>
            <input type="date" name="attendance_date" id="attendance_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
        </div>
        <div class="mb-4">
            <table class="w-full border-collapse">
                <thead>
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Student Name</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Present</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Absent</th>
                </tr>
                </thead>
                <tbody>
                <!-- Loop through students and display rows with checkboxes -->
                @if(isset($students) && count($students) > 0)
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-4 py-2">{{ $student->fname }} {{ $student->lname }}</td>
                            <td class="px-4 py-2"><input type="radio" name="attendance[{{ $student->id }}]" value="present"></td>
                            <td class="px-4 py-2"><input type="radio" name="attendance[{{ $student->id }}]" value="absent"></td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
        </div>
        <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
            Submit Attendance
        </button>
    </form>
    </div>
    @endsection

</x-app-layout>

