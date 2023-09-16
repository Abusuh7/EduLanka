<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('GradeBook') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Enter Student Marks</h1>
        <form method="POST" action="{{ route('marks.store') }}" class="max-w-md mx-auto" id="marks-form">
            @csrf

            <div class="space-y-4">
                <!-- Grade and Class Selection -->
                <div class="space-x-4 flex">
                    <div class="w-1/2">
                        <label for="grade" class="block font-semibold text-gray-600">Select Grade</label>
                        <select id="grade" name="grade_id" class="form-select" required>
                            <option value="">Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="class" class="block font-semibold text-gray-600">Select Class</label>
                        <select id="class" name="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Semester Selection -->
                <div>
                    <label for="semester" class="block font-semibold text-gray-600">Select Semester</label>
                    <select id="semester" name="semester" class="form-select" required>
                        <option value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                    </select>
                </div>

                <!-- Select Student -->
                <div>
                    <label for="student" class="block font-semibold text-gray-600">Select Student</label>
                    <select id="student" name="student_id" class="form-select" required>
                        <option value="">Select Student</option>
                        @foreach($students as $student)
                            <option value="{{ $student->id }}">{{ $student->fname }} {{ $student->lname }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Enter Marks for Each Subject -->
                <div>
                    <label class="block font-semibold text-gray-600">Enter Marks for Each Subject</label>
                    @foreach($subjects as $subject)
                        <div class="mb-2">
                            <input type="number" name="marks[]" class="form-input" placeholder="{{ $subject->subject_name }} Marks" required>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="mt-4 btn btn-primary">Submit Marks</button>
        </form>
    </div>
</x-app-layout>
