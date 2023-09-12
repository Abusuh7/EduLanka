@extends('layouts.app')

@section('content')
    <h1>Take Attendance</h1>

    <form method="post" action="{{ route('attendance.store') }}">
        @csrf

        <div class="form-group">
            <label for="class_id">Select Class:</label>
            <select name="class_id" id="class_id" class="form-control">
                @foreach ($classes as $class)
                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="grade_id">Select Grade:</label>
            <select name="grade_id" id="grade_id" class="form-control">
                @foreach ($grades as $grade)
                    <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit Attendance</button>
    </form>

    @if (isset($students))
        <h2>Students:</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Student Name</th>
                <th>Attendance Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $student->fname }} {{ $student->lname }}</td>
                    <td>
                        <select name="attendance[{{ $student->id }}]" class="form-control">
                            <option value="present">Present</option>
                            <option value="absent">Absent</option>
                        </select>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
@endsection
