<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Term Test Marks') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semi-bold mb-4">Student Marks</h1>

        <form action="{{ route('tea-marks-view') }}" method="GET" class="mb-4">
            <div class="flex items-center">
                <input
                    type="text"
                    name="search"
                    value="{{ $searchTerm ?? '' }}"
                    placeholder="Search by student name"
                    class="w-1/3 px-2 py-1 rounded focus:outline-none border border-gray-300"
                />
                <button type="submit" class="px-2 py-1 bg-blue-400 text-white rounded hover:bg-blue-600 focus:outline-none">
                    Search
                </button>
            </div>
        </form>

        @foreach($marks->groupBy('student_id') as $studentMarks)
            @php
                $student = $studentMarks->first()->student;
            @endphp

            <h2 class="text-lg font-semibold">{{ $student->fname }} {{ $student->lname }}'s Marks</h2>

            <table class="min-w-full table-auto border-collapse border border-gray-300 mt-4">
                <thead>
                <tr>
                    <th class="px-4 py-2 bg-gray-200">Subject</th>
                    <th class="px-4 py-2 bg-gray-200">1st Term</th>
                    <th class="px-4 py-2 bg-gray-200">2nd Term</th>
                    <th class="px-4 py-2 bg-gray-200">3rd Term</th>
                    <th class="px-4 py-2 bg-gray-200">Edit</th> <!-- Add an Edit column header -->
                </tr>
                </thead>
                <tbody id="marks-table-body">
                @foreach($studentMarks->groupBy('subject_id') as $subjectMarks)
                    <tr>
                        <td class="px-4 py-2">{{ $subjectMarks[0]->subject->subject_name }}</td>
                        <td class="px-4 py-2">
                            @foreach($subjectMarks as $mark)
                                @if ($mark->semester == 1)
                                    {{ $mark->marks }}
                                @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-2">
                            @foreach($subjectMarks as $mark)
                                @if ($mark->semester == 2)
                                    {{ $mark->marks }}
                                @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-2">
                            @foreach($subjectMarks as $mark)
                                @if ($mark->semester == 3)
                                    {{ $mark->marks }}
                                @endif
                            @endforeach
                        </td>
                        <td class="px-4 py-2">
                            <!-- Add an Edit button that links to the edit page -->
                            <a href="{{ route('marks.edit', ['id' => $subjectMarks[0]->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</x-app-layout>
