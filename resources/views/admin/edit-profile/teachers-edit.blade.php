<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Teachers Edit') }}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-2xl mx-auto py-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <form action="{{ route('updateTeacherProfile', $teacher->id) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <h2 class="text-xl font-semibold mb-4">Personal Information</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="fname" class="block text-sm font-medium">First Name:</label>
                            <input type="text" id="fname" name="fname" value="{{ $teacherDetails->fname }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="lname" class="block text-sm font-medium">Last Name:</label>
                            <input type="text" id="lname" name="lname" value="{{ $teacherDetails->lname }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="dob" class="block text-sm font-medium">Date of Birth:</label>
                            <input type="date" id="dob" name="dob" value="{{ $teacherDetails->dob }}" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="gender" class="block text-sm font-medium">Gender:</label>
                            <select id="gender" name="gender" required
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            <option value="" disabled selected>{{ ucwords($teacherDetails->gender) }}</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="block text-sm font-medium">Personal Email:</label>
                        <input type="email" id="email" name="email" value="{{ $teacherDetails->email }}" required
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mb-4">
                        <label for="subject" class="block text-sm font-medium">Subject:</label>
                        <select id="subject" name="subject" required
                                class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        <option value="" disabled selected>{{ ucwords($teacherDetails->subject) }}</option>
                            <option value="maths">Maths</option>
                            <option value="english">English</option>
                            <option value="science">Science</option>
                            <option value="physics">Physics</option>
                            <option value="chemistry">Chemistry</option>
                            <option value="biology">Biology</option>
                            <option value="geography">Geography</option>
                            <option value="computer-science">Computer Science</option>
                            <option value="Sinhala">Sinhala</option>
                            <option value="history">History</option>
                            <option value="art">Art</option>
                            <option value="music">Music</option>
                            <option value="dance">Dance</option>
                            <option value="pe">PE</option>
                        </select>
                    </div>

                    <h2 class="text-xl font-semibold mb-4">More Details</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="phone" class="block text-sm font-medium">Phone No:</label>
                            <input type="tel" id="phone" name="phone" required value="{{ $teacherDetails->phone }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="address" class="block text-sm font-medium">Address:</label>
                            <input type="text" id="address" name="address" required value="{{ $teacherDetails->address }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="city" class="block text-sm font-medium">City:</label>
                            <input type="text" id="city" name="city" required value="{{ $teacherDetails->city }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="state" class="block text-sm font-medium">State:</label>
                            <input type="text" id="state" name="state" required value="{{ $teacherDetails->state }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-2">
                            <label for="zip" class="block text-sm font-medium">Zip:</label>
                            <input type="number" id="zip" name="zip" required value="{{ $teacherDetails->zip }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                        <div class="mb-2">
                            <label for="country" class="block text-sm font-medium">Country:</label>
                            <input type="text" id="country" name="country" required value="{{ $teacherDetails->country }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>

                    <h2 class="text-xl font-semibold mb-4">Enrollment Details</h2>
                    <div class="mb-2">
                        <label for="enroll_date" class="block text-sm font-medium">Enrollment Date:</label>
                        <input type="date" id="enroll_date" name="enroll_date" required value="{{ $enrollment->enroll_date }}"
                               class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                    </div>

                    <div class="mt-4">
                        <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-white rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-opacity-50">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

