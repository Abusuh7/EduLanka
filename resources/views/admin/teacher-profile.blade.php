<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $teacher->name }}'s Profile
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">User Details</h1>
                    <h2 class="text-lg">Name: {{ $teacher->name }}</h2>
                    <h2 class="text-lg">Email: {{ $teacher->email }}</h2>
                    <h2 class="text-lg">Role: {{ $teacher->role }}</h2>
                    <h2 class="text-lg">
                        Status: <b><span class="{{ $teacher->status === 'deactivated' ? 'text-red-500' : 'text-green-500' }}">{{ ucwords($teacher->status) }}</span></b>
                    </h2>
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Teacher Details</h1>
                    <h2 class="text-lg">First Name: {{ $teacherDetails->fname }}</h2>
                    <h2 class="text-lg">Last Name: {{ $teacherDetails->lname }}</h2>
                    <h2 class="text-lg">Date of Birth: {{ $teacherDetails->dob }}</h2>
                    <h2 class="text-lg">Gender: {{ $teacherDetails->gender }}</h2>
                    <h2 class="text-lg">Email: {{ $teacherDetails->email }}</h2>
                    <h2 class="text-lg">Subject: {{ $teacherDetails->subject }}</h2>
                    <h2 class="text-lg">Phone: {{ $teacherDetails->phone }}</h2>
                    <h2 class="text-lg">Address: {{ $teacherDetails->address }}</h2>
                    <h2 class="text-lg">City: {{ $teacherDetails->city }}</h2>
                    <h2 class="text-lg">State: {{ $teacherDetails->state }}</h2>
                    <h2 class="text-lg">Zip: {{ $teacherDetails->zip }}</h2>
                    <h2 class="text-lg">Country: {{ $teacherDetails->country }}</h2>
                    <h2 class="text-lg">Last Updated: {{ $teacherDetails->updated_at }}</h2>
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Enrollment Details</h1>
                    <h2 class="text-lg">Enrollment Date: {{ $enrollment->enroll_date }}</h2>
                </div>

            </div>
        </div>
    </div>



</x-app-layout>
