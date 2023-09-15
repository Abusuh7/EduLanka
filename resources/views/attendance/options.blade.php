<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attendance Management') }}
        </h2>
    </x-slot>

   <a href="{{route('attendance.index')}}"> take attendance</a> <br>
    <a href="{{route('attendance.view')}}"> view attendance</a><br>
    <a href="{{route('attendance.edit')}}"> edit attendance</a> <br>


</x-app-layout>
