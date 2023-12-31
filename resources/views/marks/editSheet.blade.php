<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mark Sheet') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Edit Mark Sheet</h1>
        <div class="mb-4">
            <label for="semester-filter" class="block font-semibold text-gray-600">Filter by Semester</label>
            <select id="semester-filter" class="form-select">
                <option value="">All Semesters</option>
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
            </select>
            <button id="filter-button" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Filter</button>
        </div>

        <!-- Add an "Update Mark Sheet" button -->
        <form method="POST" action="{{ route('marks.updateSheet') }}">
            @csrf
            @method('PUT')

            <!-- Display subject names and input fields for marks -->
            <table class="min-w-full table-auto border-collapse border border-gray-300">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200">Subject</th>
                    <th class="px-4 py-2 bg-gray-200">Semester</th>
                    <th class="px-4 py-2 bg-gray-200">Marks</th>
                </tr>
                </thead>
                <tbody id="marks-table-body">
                @foreach($marks as $mark)
                    <tr data-semester="{{ $mark->semester }}">
                        <td class="px-4 py-2">{{ $mark->subject->subject_name }}</td>
                        <td class="px-4 py-2">{{ $mark->semester }}</td>
                        <td class="px-4 py-2">
                            <input type="number" name="marks[{{ $mark->id }}]" value="{{ $mark->marks }}" class="form-control">
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <br>
            <button type="submit" class="ml-2 px-4 py-2 bg-blue-500 text-white rounded">Update Mark Sheet</button>

        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const semesterFilter = document.getElementById('semester-filter');
            const filterButton = document.getElementById('filter-button');
            const marksTableBody = document.getElementById('marks-table-body');
            const rows = marksTableBody.querySelectorAll('tr');

            filterButton.addEventListener('click', function() {
                const selectedSemester = semesterFilter.value;

                // Show all rows initially
                rows.forEach(row => {
                    row.style.display = '';
                });

                // Hide rows with semesters not matching the selected semester
                if (selectedSemester !== '') {
                    rows.forEach(row => {
                        const semester = row.getAttribute('data-semester');
                        if (semester !== selectedSemester) {
                            row.style.display = 'none';
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
