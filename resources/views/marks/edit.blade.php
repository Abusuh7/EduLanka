<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('edit marks') }}
        </h2>
    </x-slot>

    <div class="container">
        <h1>Edit Marks</h1>

        <!-- Display validation errors if any -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Marks Form -->
        <form method="POST" action="{{ route('marks.update', $mark->id) }}">

            @csrf
            @method('PUT')

            <!-- Display subject names and input fields for marks -->
            @foreach ($mark->subjects as $subject)
                <div class="form-group">
                    <label for="{{ 'subject_' . $subject->id }}">{{ $subject->subject_name }} Marks:</label>
                    <input type="number" name="marks[{{ $subject->id }}]" id="{{ 'subject_' . $subject->id }}"
                           value="{{ old('marks.' . $subject->id, $mark->marks[$subject->id]) }}"
                           class="form-control">
                </div>
            @endforeach

            <button type="submit" class="btn btn-primary">Update Marks</button>
        </form>
    </div>
</x-app-layout>
