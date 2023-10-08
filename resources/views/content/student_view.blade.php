<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 leading-tight">
            {{ __('Contents') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="mb-8 flex flex-wrap justify-between items-center space-y-4 md:space-y-0">
            <div class="w-full md:w-1/3">
                <label for="subject_filter" class="block text-lg font-medium mb-2">Filter by Subject:</label>
                <select id="subject_filter" class="w-[90%] border rounded py-2 px-3">
                    <option value="">All Subjects</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-1/3">
                <label for="date_filter" class="block text-lg font-medium mb-2">Filter by Date:</label>
                <input type="date" id="date_filter" class="w-[90%] border rounded py-2 px-3">
            </div>
            <div class="w-full md:w-1/3">
                <label for="month_filter" class="block text-lg font-medium mb-2">Filter by Month:</label>
                <select id="month_filter" class="w-[90%] border rounded py-2 px-3">
                    <option value="">All Months</option>
                    <option value="01">January</option>
                    <option value="02">February</option>
                    <option value="03">March</option>
                    <option value="04">April</option>
                    <option value="05">May</option>
                    <option value="06">June</option>
                    <option value="07">July</option>
                    <option value="08">August</option>
                    <option value="09">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($contents as $content)
                <div class="content-item bg-white shadow-md rounded-lg p-4"
                     data-subject="{{ $content->subject_id }}" data-date="{{ $content->created_at }}">
                    <h3 class="text-lg font-medium">{{ $content->title }}</h3>
                    <p class="mt-2">{{ $content->description }}</p>
                    <p class="mt-2">Date: {{ $content->created_at }}</p>
                    <p class="mt-2">Subject: {{ $content->subject->subject_name }}</p>
                    <a href="{{ route('student.content.download', $content->id) }}"
                       class="inline-block mt-2 px-4 py-2 text-white bg-blue-500 rounded-full
                            hover:bg-blue-600 transition duration-300 ease-in-out">Download</a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // JavaScript to handle filtering based on subject, date, and month selection
        document.addEventListener('DOMContentLoaded', function () {
            const subjectFilter = document.getElementById('subject_filter');
            const dateFilter = document.getElementById('date_filter');
            const monthFilter = document.getElementById('month_filter');
            const contentItems = document.querySelectorAll('.content-item');

            subjectFilter.addEventListener('change', filterItems);
            dateFilter.addEventListener('change', filterItems);
            monthFilter.addEventListener('change', filterItems);

            function filterItems() {
                const selectedSubjectId = subjectFilter.value;
                const selectedDate = dateFilter.value;
                const selectedMonth = monthFilter.value;

                contentItems.forEach(function (contentItem) {
                    const subjectId = contentItem.getAttribute('data-subject');
                    const contentDate = contentItem.getAttribute('data-date');
                    const contentMonth = contentDate.split('-')[1];

                    const subjectMatch = !selectedSubjectId || selectedSubjectId === subjectId;
                    const dateMatch = !selectedDate || selectedDate === contentDate;
                    const monthMatch = !selectedMonth || selectedMonth === contentMonth;

                    if (subjectMatch && dateMatch && monthMatch) {
                        contentItem.style.display = 'block';
                    } else {
                        contentItem.style.display = 'none';
                    }
                });
            }
        });
    </script>
</x-app-layout>
