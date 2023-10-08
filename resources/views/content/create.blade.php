<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Content') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
            <h1 class="text-3xl font-semibold mb-4">Publish Content</h1>

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-4">
                    <label for="subject" class="block text-sm font-medium text-gray-700">Subject:</label>
                    <select name="subject_id" id="subject_id" class="block w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none sm:text-base">
                        <option value="">Select Subject</option>
                        {{-- Populate subjects from your database --}}
                        @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="grade" class="block text-sm font-medium text-gray-700">Grade:</label>
                    <select name="grade_id" id="grade_id" class="block w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none sm:text-base">
                        <option value="">Select Grade</option>
                        {{-- Populate grades from your database --}}
                        @foreach ($grades as $grade)
                            <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="class" class="block text-sm font-medium text-gray-700">Class:</label>
                    <select name="class_id" id="class_id" class="block w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none sm:text-base">
                        <option value="">Select Class</option>
                        {{-- Populate classes from your database --}}
                        @foreach ($classes as $class)
                            <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="block w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none sm:text-base">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description:</label>
                    <textarea name="description" id="description" rows="4" class="block w-full p-2 mt-1 border rounded-md focus:ring focus:ring-blue-200 focus:outline-none sm:text-base"></textarea>
                </div>

                <div class="mb-4">
                    <label for="file_path" class="block text-sm font-medium text-gray-700">File Upload:</label>
                    <label for="file_path" class="block mt-1 cursor-pointer border border-blue-gray bg-gray-500 text-white py-2 px-4 rounded-md text-center hover:bg-gray-700 transition duration-300 ease-in-out">
                        Upload File
                    </label>
                    <input type="file" name="file_path" id="file_path" class="hidden">
                </div>

                <div class="mb-4">
                    <button type="submit" class="w-full p-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                        Submit Content
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
