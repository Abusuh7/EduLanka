<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-800 leading-tight">
            {{ __('GradeBook') }}
        </h2>
    </x-slot>
    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4 text-blue-800">Enter Student Marks</h1>
        <form method="POST" action="{{ route('marks.store') }}" class="max-w-md mx-auto" id="marks-form">
            @csrf

            <div class="space-y-4">
                <!-- Grade and Class Selection -->
                <div class="space-x-4 flex items-center">
                    <div class="w-1/2">
                        <label for="grade" class="block font-semibold text-gray-600 text-blue-800">Select Grade</label>
                        <select id="grade" name="grade_id" class="form-select" required>
                            <option value="">Select Grade</option>
                            @foreach($grades as $grade)
                                <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="class" class="block font-semibold text-gray-600 text-blue-800">Select Class</label>
                        <select id="class" name="class_id" class="form-select" required>
                            <option value="">Select Class</option>
                            @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="button" id="filter-students" class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Go
                    </button>
                </div>

                <!-- Semester and Select Student Inline -->
                <div class="space-x-4 flex items-center">
                    <div class="w-1/2">
                        <label for="semester" class="block font-semibold text-gray-600 text-blue-800">Select Semester</label>
                        <select id="semester" name="semester" class="form-select" required>
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                        </select>
                    </div>
                    <div class="w-1/2">
                        <label for="student" class="block font-semibold text-gray-600 text-blue-800">Select Student</label>
                        <select id="student" name="student_id" class="form-select" required>
                            <option value="">Select Student</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->fname }} {{ $student->lname }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Enter Marks for Each Subject -->
                <div>
                    <label class="block font-semibold text-gray-600 text-blue-800">Enter Marks for Each Subject</label>
                    @foreach($subjects as $subject)
                        <div class="mb-2 flex items-center">
                            <div class="w-1/2">
                                <label for="marks_{{ $subject->id }}" class="text-blue-800">{{ $subject->subject_name }}</label>
                            </div>
                            <div class="w-1/2">
                                <input type="number" id="marks_{{ $subject->id }}" name="marks[]" class="form-input" placeholder="Marks" required>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="mt-4 btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Submit Marks
            </button>
        </form>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterStudentsButton = document.getElementById('filter-students');
        const gradeSelect = document.getElementById('grade');
        const classSelect = document.getElementById('class');
        const studentSelect = document.getElementById('student');

        filterStudentsButton.addEventListener('click', function() {
            const selectedGrade = gradeSelect.value;
            const selectedClass = classSelect.value;

            // Make an AJAX request to fetch students based on grade and class
            fetch(`/get-students?grade_id=${selectedGrade}&class_id=${selectedClass}`)
                .then(response => response.json())
                .then(data => {
                    // Clear existing options
                    studentSelect.innerHTML = '<option value="">Select Student</option>';

                    // Add new options based on the fetched data
                    data.forEach(student => {
                        const option = document.createElement('option');
                        option.value = student.id;
                        option.textContent = `${student.fname} ${student.lname}`;
                        studentSelect.appendChild(option);
                    });
                });
        });
    });
</script>
