<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contents') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-4">
        <!-- Filter Form -->
        <form action="{{ route('student.content.filter') }}" method="GET">
            @csrf

            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium text-gray-700">Select Grade:</label>
                <select name="grade_id" id="grade_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="">Select Grade</option>
                    {{-- Populate grades from your database --}}
                    @foreach ($grades as $grade)
                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="class" class="block text-sm font-medium text-gray-700">Select Class:</label>
                <select name="class_id" id="class_id" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:outline-none sm:text-sm">
                    <option value="">Select Class</option>
                    {{-- Populate classes from your database --}}
                    @foreach ($classes as $class)
                        <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <button type="submit" class="px-4 py-2 font-medium text-white bg-blue-500 rounded-full hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">
                    Filter
                </button>
            </div>
        </form>

        <!-- Content List -->
        <div>
            @foreach ($contents as $content)
                <div class="mb-4">
                    <h3 class="text-lg font-medium">{{ $content->title }}</h3>
                    <p>{{ $content->description }}</p>
                    <a href="{{ route('student.content.download', $content->id) }}" class="text-blue-500 hover:underline">Download</a>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
