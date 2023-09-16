<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contents') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <div class="mb-4 w-full max-w-md">
            <label for="subject_filter" class="block font-medium text-lg mb-2 text-blue-600">Filter by Subject:</label>
            <select id="subject_filter" class="w-full border rounded py-2 px-3">
                <option value="">All Subjects</option>
                @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            @foreach ($contents as $content)
                <div class="content-item bg-white shadow-md rounded-lg p-4 border border-blue-300">
                    <h3 class="text-lg font-medium text-blue-600">{{ $content->title }}</h3>
                    <p class="mt-2 text-gray-700">{{ $content->description }}</p>
                    <p class="mt-2 text-gray-500">{{ $content->created_at }}</p>
                    <p class="mt-2 text-blue-600">Subject: {{ $content->subject->subject_name }}</p>
                    <a href="{{ route('student.content.download', $content->id) }}" class="inline-block mt-2 px-4 py-2 text-white bg-blue-600 rounded-full hover:bg-blue-700 transition duration-300 ease-in-out">Download</a>

                    {{-- Edit Button --}}
                    <a href="{{ route('content.edit', $content->id) }}" class="inline-block mt-2 px-4 py-2 text-white bg-green-500 rounded-full hover:bg-green-600 transition duration-300 ease-in-out">Edit</a>

                    {{-- Delete Button --}}
                    <form action="{{ route('content.destroy', $content->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="inline-block mt-2 px-4 py-2 text-white bg-red-500 rounded-full hover:bg-red-600 transition duration-300 ease-in-out" onclick="return confirm('Are you sure you want to delete this content?')">Delete</button>
                    </form>
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
