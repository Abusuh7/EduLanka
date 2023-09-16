<div class="container">
    <h1>Your Marks</h1>
    <table class="table">
        <thead>
        <tr>
            <th>Subject</th>
            <th>Semester</th>
            <th>Marks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($marks as $mark)
            <tr>
                <td>{{ $mark->subject->subject_name}}</td>
                <td>{{ $mark->semester }}</td>
                <td>{{ $mark->marks }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
