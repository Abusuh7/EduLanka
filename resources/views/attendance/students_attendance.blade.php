<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mark Attendance') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('attendance.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="global_attendance_date" class="block text-sm font-medium text-gray-700">Attendance Date:</label>
                <input type="date" required id="global_attendance_date" name="global_attendance_date" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full border border-collapse border-gray-300">
                    <thead>
                    <tr class="bg-blue-100">
                        <th class="px-4 py-2 text-left border-b">Student</th>
                        <th class="px-4 py-2 text-left border-b">Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($students as $student)
                        <tr>
                            <td class="px-4 py-2 border-b">
                                {{ $student->fname }} {{ $student->lname }}
                                <input type="hidden" name="attendance[{{ $student->id }}][student_id]" value="{{ $student->id }}">
                            </td>
                            <td class="px-4 py-2 border-b">
                                <select name="attendance[{{ $student->id }}][status]" class="block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                                    <option value="present">Present</option>
                                    <option value="absent">Absent</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Save Attendance
                </button>
                <a href="{{ route('attendance.index') }}" class="ml-4 text-sm text-gray-600 font-semibold hover:underline">Back</a>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('global_attendance_date').addEventListener('change', function () {
            const selectedDate = this.value;
            // Set the selected date for all student date inputs
            document.querySelectorAll('select[name^="attendance["]').forEach(function (statusSelect) {
                const studentId = statusSelect.id.replace('status_', '');
                const dateInput = document.getElementById('attendance_date_' + studentId);
                dateInput.value = selectedDate;
            });
        });
    </script>
</x-app-layout>
