<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semester Marks') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Your Marks</h1>

        <table class="min-w-full table-auto border-collapse border border-gray-300">
            <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200">Subject</th>
                <th class="px-4 py-2 bg-gray-200">Term 1</th>
                <th class="px-4 py-2 bg-gray-200">Term 2</th>
                <th class="px-4 py-2 bg-gray-200">Term 3</th>
                <th class="px-4 py-2 bg-gray-200">Pass/Fail</th>
            </tr>
            </thead>
            <tbody id="marks-table-body">
            @foreach($marks as $mark)
                <tr>
                    <td class="px-4 py-2">{{ $mark->subject->subject_name }}</td>
                    <td class="px-4 py-2 @if($mark->semester == 1) bg-green-200 @endif">{{ $mark->semester == 1 ? $mark->marks : '-' }}</td>
                    <td class="px-4 py-2 @if($mark->semester == 2) bg-green-200 @endif">{{ $mark->semester == 2 ? $mark->marks : '-' }}</td>
                    <td class="px-4 py-2 @if($mark->semester == 3) bg-green-200 @endif">{{ $mark->semester == 3 ? $mark->marks : '-' }}</td>
                    <td class="px-4 py-2 @if($mark->marks >= 40) text-green-600 @else text-red-600 @endif">
                        {{ $mark->marks >= 40 ? 'Pass' : 'Fail' }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td class="px-4 py-2 font-semibold">Total</td>
                <td class="px-4 py-2 font-semibold">{{ $totalTerm1 }}</td>
                <td class="px-4 py-2 font-semibold">{{ $totalTerm2 }}</td>
                <td class="px-4 py-2 font-semibold">{{ $totalTerm3 }}</td>
                <td class="px-4 py-2"></td>
            </tr>
            </tbody>
        </table>
    </div>
</x-app-layout>
