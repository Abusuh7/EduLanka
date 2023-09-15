<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Content') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700">Subject:</label>
                <select name="subject_id" id="subject_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="">Select Subject</option>
                    {{-- Populate subjects from your database --}}
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="class" class="block text-sm font-medium text-gray-700">Class:</label>
                <select name="class_id" id="class_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="">Select Class</option>
                    {{-- Populate classes from your database --}}
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium text-gray-700">Grade:</label>
                <select name="grade_id" id="grade_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="">Select Grade</option>
                    {{-- Populate grades from your database --}}
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                <input type="text" name="title" id="title" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
            </div>

            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                <textarea name="description" id="description" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm"></textarea>
            </div>

            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700">File Upload:</label>
                <input type="file" name="file_path" id="file_path" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Submit Content
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
