<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>


    <h2>TESTING THE BRANCH</h2>

    <div class="p-4 max-w-md mx-auto">
        <h2 class="text-xl font-semibold mb-4">Create New Student</h2>
        <form action="{{ route('store') }}" method="post">
            @csrf

            <div class="mb-4">
                <label for="fname" class="block text-sm font-medium">First Name:</label>
                <input type="text" id="fname" name="fname" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="lname" class="block text-sm font-medium">Last Name:</label>
                <input type="text" id="lname" name="lname" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="dob" class="block text-sm font-medium">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="gender" class="block text-sm font-medium">Gender:</label>
                <select id="gender" name="gender"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" required>
                    <option value="">Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="grade" class="block text-sm font-medium">Grade:</label>
                <select id="grade" name="grade" required
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    <option value="" disabled selected>Select Grade</option>
                    <option value="1">1st</option>
                    <option value="2">2nd</option>
                    <option value="3">3rd</option>
                    <option value="4">4th</option>
                    <option value="5">5th</option>
                    <option value="6">6th</option>
                    <option value="7">7th</option>
                    <option value="8">8th</option>
                    <option value="9">9th</option>
                    <option value="10">10th</option>
                    <option value="11">11th</option>
                    <option value="12">12th</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="class" class="block text-sm font-medium">Class:</label>
                <select id="class" name="class" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    <option value="" disabled selected>Select Class</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>
                </select>
            </div>

            <h2 class="text-xl font-semibold mb-4">Parent Details</h2>
            <div class="mb-4">
                <label for="parent_fname" class="block text-sm font-medium">Parent's First Name:</label>
                <input type="text" id="parent_fname" name="parent_fname" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_lname" class="block text-sm font-medium">Parent's Last Name:</label>
                <input type="text" id="parent_lname" name="parent_lname" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_email" class="block text-sm font-medium">Parent's Email:</label>
                <input type="email" id="parent_email" name="parent_email" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_phone" class="block text-sm font-medium">Parent's Phone:</label>
                <input type="number" id="parent_phone" name="parent_phone" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_address" class="block text-sm font-medium">Parent's Address:</label>
                <input type="text" id="parent_address" name="parent_address" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_city" class="block text-sm font-medium">Parent's City:</label>
                <input type="text" id="parent_city" name="parent_city" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_state" class="block text-sm font-medium">Parent's State:</label>
                <input type="text" id="parent_state" name="parent_state" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_zip" class="block text-sm font-medium">Parent's Zip:</label>
                <input type="number" id="parent_zip" name="parent_zip" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <label for="parent_country" class="block text-sm font-medium">Parent's Country:</label>
                <input type="text" id="parent_country" name="parent_country" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <h2 class="text-xl font-semibold mb-4">Enrollment Details</h2>
            <div class="mb-4">
                <label for="enroll_date" class="block text-sm font-medium">Enrollment Date:</label>
                <input type="date" id="enroll_date" name="enroll_date" required
                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
            </div>

            <div class="mb-4">
                <button type="submit"
                    class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-opacity-50">
                    Create
                </button>
            </div>

        </form>
    </div>

    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div> --}}
</x-app-layout>
