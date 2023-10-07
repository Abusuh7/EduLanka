<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Mark') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semi-bold mb-4">Edit Mark</h1>

        @if (session('success'))
            <div class="bg-green-200 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('marks.update', ['mark' => $mark->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="marks" class="block text-gray-700 text-sm font-bold mb-2">Marks</label>
                <input
                    type="number"
                    name="marks"
                    id="marks"
                    value="{{ old('marks', $mark->marks) }}"
                    class="w-full px-3 py-2 rounded border focus:outline-none focus:border-blue-500 @error('marks') border-red-500 @enderror"
                />
                @error('marks')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">
                    Update Mark
                </button>
                <a href="{{ route('marks.index') }}" class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-600 focus:outline-none">
                    Back to Marks
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
