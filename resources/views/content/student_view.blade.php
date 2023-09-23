<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contents') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="mb-4 w-full max-w-md">
            <label for="subject_filter" class="block font-medium text-lg mb-2">Filter by Subject:</label>
            <select id="subject_filter" class="w-full border rounded py-2 px-3">
                <option value="">All Subjects</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($contents as $content)
                <div class="content-item bg-white shadow-md rounded-lg p-4" data-subject="{{ $content->subject_id }}">
                    <h3 class="text-lg font-medium">{{ $content->title }}</h3>
                    <p class="mt-2">{{ $content->description }}</p>
                    <p class="mt-2">{{ $content->created_at }}</p>
                    <p class="mt-2">Subject: {{ $content->subject->subject_name }}</p>
                    <a href="{{ route('student.content.download', $content->id) }}" class="inline-block mt-2 px-4 py-2 text-white bg-blue-500 rounded-full
                    hover:bg-blue-600 transition duration-300 ease-in-out">Download</a>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        // JavaScript to handle filtering based on subject selection
        document.addEventListener('DOMContentLoaded', function () {
            const subjectFilter = document.getElementById('subject_filter');
            const contentItems = document.querySelectorAll('.content-item');

            subjectFilter.addEventListener('change', function () {
                const selectedSubjectId = subjectFilter.value;

                contentItems.forEach(function (contentItem) {
                    const subjectId = contentItem.getAttribute('data-subject');

                    if (!selectedSubjectId || selectedSubjectId === subjectId) {
                        contentItem.style.display = 'block';
                    } else {
                        contentItem.style.display = 'none';
                    }
                });
            });
        });
    </script>
</x-app-layout>
