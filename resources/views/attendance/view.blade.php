<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Attendance') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('attendance.show') }}" method="GET">
            @csrf

            <div class="mb-4">
                <label for="grade">Grade</label>
                <select name="grade" id="grade" class="block w-full p-1.5 mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm text-gray-800">
                    <option value="">Select Grade</option>
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-4">
                <label for="class">Class</label>
                <select name="class" id="class" class="block w-full p-1.5 mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm text-gray-800">
                    <option value="">Select Class</option>
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>

            </div>

            <div class="mb-4">
                <label for="attendance_date">Select Attendance Date:</label>
                <input type="date" name="attendance_date" id="attendance_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
            </div>


            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    View Attendance
                </button>
                <a href="{{ route('attendance.options') }}" class="ml-4 text-sm text-gray-600 font-semibold hover:underline">Back</a>
            </div>
        </form>
    </div>
</x-app-layout>
