<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Semester Marks') }}
        </h2>
    </x-slot>

    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-semibold mb-4">Your Marks</h1>

        <div class="overflow-x-auto">
            <table class="min-w-full table-auto border-collapse border border-blue-300">
                <thead class="text-center">
                <tr>
                    <th class="px-4 py-2 bg-blue-400">Subject</th>
                    <th class="px-4 py-2 bg-blue-400">Term 1</th>
                    <th class="px-4 py-2 bg-blue-400">Term 2</th>
                    <th class="px-4 py-2 bg-blue-400">Term 3</th>
                    <th class="px-4 py-2 bg-blue-400">Pass/Fail</th>
                </tr>
                </thead>
                <tbody id="marks-table-body">
                @foreach($marks as $mark)
                    <tr class="text-center">
                        <td class="px-4 py-2">{{ $mark->subject->subject_name }}</td>
                        <td class="@if($mark->semester == 1) bg-blue-100 @endif">{{ $mark->semester == 1 ? $mark->marks : '-' }}</td>
                        <td class="@if($mark->semester == 2) bg-blue-200 @endif">{{ $mark->semester == 2 ? $mark->marks : '-' }}</td>
                        <td class="@if($mark->semester == 3) bg-blue-600 @endif">{{ $mark->semester == 3 ? $mark->marks : '-' }}</td>
                        <td class="@if($mark->marks >= 75) text-green-600 font-semibold @elseif($mark->marks >= 65) text-blue-600 font-semibold @elseif($mark->marks >= 40) text-yellow-600 font-semibold @else text-red-600 font-semibold @endif">
                            @if($mark->marks >= 75) A @elseif($mark->marks >= 65) B @elseif($mark->marks >= 40) C @else F @endif
                        </td>
                    </tr>
                @endforeach
                <tr class="text-center">
                    <td class="px-4 py-2 font-semibold bg-blue-400">Total</td>
                    <td class="font-semibold bg-blue-400">{{ $totalTerm1 }}</td>
                    <td class="font-semibold bg-blue-400">{{ $totalTerm2 }}</td>
                    <td class="font-semibold bg-blue-400">{{ $totalTerm3 }}</td>
                    <td class="font-semibold bg-blue-400"></td>
                    <td></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
