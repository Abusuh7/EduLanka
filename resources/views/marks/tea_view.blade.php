<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Grade Book') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">Student Marks</h1>

        <div x-data="{ searchTerm: '{{ $searchTerm ?? '' }}' }">
            <form action="{{ route('tea-marks-view') }}" method="GET" class="mb-4">
                <div class="flex items-center">
                    <input
                        x-model="searchTerm"
                        type="text"
                        name="search"
                        placeholder="Search by Student Name"
                        class="w-1/3 px-3 py-2 rounded-l-lg focus:outline-none border border-gray-300"
                    />
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-r-lg hover:bg-blue-700 focus:outline-none">
                        Search
                    </button>
                    <button
                        @click="clearSearch"
                        x-show="searchTerm"
                        type="button"
                        class="ml-2 px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 focus:outline-none"
                    >
                        Clear Search
                    </button>
                </div>
            </form>
        </div>

        @foreach($marks->groupBy('student_id') as $studentMarks)
            @php
                $student = $studentMarks->first()->student;
            @endphp

            @if(empty($searchTerm) || (str_contains(strtolower($student->fname), strtolower($searchTerm)) || str_contains(strtolower($student->lname), strtolower($searchTerm))))
                <div class="mt-6 p-4 border bg-white rounded-lg shadow-md">
                    <h2 class="text-xl font-semibold">{{ $student->fname }} {{ $student->lname }}</h2>

                    <div class="overflow-x-auto">
                        <div x-data="{ open: false }">
                            <button @click="open = !open" class="mt-2 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none">
                                View Marks
                            </button>

                            <table x-show="open" class="w-full mt-4 table-fixed border-collapse border border-gray-300">
                                <thead>
                                <tr>
                                    <th class="w-1/5 px-4 py-2 bg-gray-200 text-center border">Subject</th>
                                    <th class="w-1/5 px-4 py-2 bg-gray-200 text-center border">1st Term</th>
                                    <th class="w-1/5 px-4 py-2 bg-gray-200 text-center border">2nd Term</th>
                                    <th class="w-1/5 px-4 py-2 bg-gray-200 text-center border">3rd Term</th>
                                    <th class="w-1/5 px-4 py-2 bg-gray-200 border"></th>
                                </tr>
                                </thead>
                                <tbody id="marks-table-body">
                                @foreach($studentMarks->groupBy('subject_id') as $subjectMarks)
                                    <tr>
                                        <td class="w-1/5 px-4 py-2 text-center border">{{ $subjectMarks[0]->subject->subject_name }}</td>
                                        <td class="w-1/5 px-4 py-2 text-center border">
                                            @foreach($subjectMarks as $mark)
                                                @if ($mark->semester == 1)
                                                    {{ $mark->marks }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="w-1/5 px-4 py-2 text-center border">
                                            @foreach($subjectMarks as $mark)
                                                @if ($mark->semester == 2)
                                                    {{ $mark->marks }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="w-1/5 px-4 py-2 text-center border">
                                            @foreach($subjectMarks as $mark)
                                                @if ($mark->semester == 3)
                                                    {{ $mark->marks }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td class="w-1/5 px-4 py-2 text-center border">
                                            <a href="{{ route('marks.edit', ['id' => $subjectMarks[0]->id]) }}" class="text-blue-600 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <script>
        function clearSearch() {
            this.searchTerm = '';
        }
    </script>
</x-app-layout>
