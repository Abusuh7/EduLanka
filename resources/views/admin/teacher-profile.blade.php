<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $teacher->name }}'s Profile
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">

                <!-- User Details Section -->
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold">User Details</h1>
                    <table class="w-full">
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Name:</td>
                            <td class="border px-4 py-2">{{ $teacher->name }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Email:</td>
                            <td class="border px-4 py-2">{{ $teacher->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Role:</td>
                            <td class="border px-4 py-2">{{ $teacher->role }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Status:</td>
                            <td class="border px-4 py-2">
                                <b>
                                    <span class="{{ $teacher->status === 'deactivated' || $teacher->status === 'terminated' ? 'text-red-500' : 'text-green-500' }}">
                                        {{ ucwords($teacher->status) }}
                                    </span>
                                </b>
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Teacher and Enrollment Details Section -->
                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-blue-700">Teacher Details</h1>
                    <table class="w-full">
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">First Name:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->fname }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Last Name:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->lname }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Date of Birth:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->dob }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Gender:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->gender }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Email:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->email }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Subject:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->subject }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Phone:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->phone }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Address:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->address }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">City:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->city }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">State:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->state }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Zip:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->zip }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Country:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->country }}</td>
                        </tr>
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Last Updated:</td>
                            <td class="border px-4 py-2">{{ $teacherDetails->updated_at }}</td>
                        </tr>
                    </table>
                </div>


                <div class="mb-6">
                    <h1 class="text-2xl font-semibold text-blue-700">Enrollment Details</h1>
                    <table class="w-full">
                        <tr>
                            <td class="font-semibold text-gray-600 border px-4 py-2">Enrollment Date:</td>
                            <td class="border px-4 py-2">{{ $enrollment->enroll_date }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


