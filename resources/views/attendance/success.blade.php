<x-app-layout>
    <div class="bg-blue-500 min-h-screen flex flex-col justify-center items-center">
        <div class="bg-white rounded-lg shadow-md p-8 w-96 text-center">
            <svg class="w-16 h-16 mx-auto text-green-500 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <h2 class="text-2xl font-semibold text-gray-800 leading-tight mb-6">Success!</h2>
            <p class="text-gray-600">You have successfully recorded attendance for the students.</p>
            <div class="mt-6">
                <a href="{{ route('attendance.options') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-full inline-block">Back to Dashboard</a>
            </div>
        </div>
    </div>
</x-app-layout>
