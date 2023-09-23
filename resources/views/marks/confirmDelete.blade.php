<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('delete confirmation') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Delete Marks</h1>

        <p>Are you sure you want to delete the marks for {{ $mark->student->name }} in semester {{ $mark->semester }}?</p>

        <!-- Delete Confirmation Form -->
        <form method="POST" action="{{ route('marks.destroy', $mark) }}">
            @csrf
            @method('DELETE')

            <button type="submit" class="btn btn-danger">Delete</button>
            <a href="{{ route('marks.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</x-app-layout>
