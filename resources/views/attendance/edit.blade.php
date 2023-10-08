 <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Attendance') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-semibold mb-4">Edit Attendance Record</h2>

        <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="attendance_date">Attendance Date:</label>
                <input  disabled name="attendance_date" id="attendance_date" class="block w-full mt-1 p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm" value="{{ $attendance->attendance_date }}">
            </div>

            <div class="mb-4">
                <label for="status">Status:</label>
                <select name="status" id="status" class="block w-full mt-1 p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="present" @if ($attendance->status === 'present') selected @endif>Present</option>
                    <option value="absent" @if ($attendance->status === 'absent') selected @endif>Absent</option>
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Update Attendance
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
