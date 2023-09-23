<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Content') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <form action="{{ route('content.update', $content->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Subject Selection (Example) -->
            <div class="mb-4">
                <label for="subject_id" class="block font-medium text-lg mb-2">Select Subject:</label>
                <select id="subject_id" name="subject_id" class="w-full border rounded py-2 px-3">
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}" {{ $subject->id == $content->subject_id ? 'selected' : '' }}>{{ $subject->subject_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Other Fields (Example) -->
            <div class="mb-4">
                <label for="title" class="block font-medium text-lg mb-2">Title:</label>
                <input type="text" id="title" name="title" class="w-full border rounded py-2 px-3" value="{{ $content->title }}">
            </div>

            <div class="mb-4">
                <label for="description" class="block font-medium text-lg mb-2">Description:</label>
                <textarea id="description" name="description" class="w-full border rounded py-2 px-3">{{ $content->description }}</textarea>
            </div>

            <!-- File Upload (Example) -->
            <div class="mb-4">
                <label for="file_path" class="block font-medium text-lg mb-2">File (PDF, DOCX, etc.):</label>
                <input type="file" id="file_path" name="file_path" class="w-full border rounded py-2 px-3">
            </div>

            <div class="mt-4">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 transition duration-300 ease-in-out">Save</button>
            </div>
        </form>
    </div>
</x-app-layout>
