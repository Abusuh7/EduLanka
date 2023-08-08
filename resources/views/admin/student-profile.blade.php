<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $users->name }}'s Profile
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">User Details</h1>
                    <h2 class="text-lg mb-1">Name: {{ $users->name }}</h2>
                    <h2 class="text-lg mb-1">Email: {{ $users->email }}</h2>
                    <h2 class="text-lg mb-1">Role: {{ $users->role }}</h2>
                    <h2 class="text-lg">Status: <b><span
                            class="{{ $users->status === 'deactivated' ? 'text-red-500' : 'text-green-500' }}">{{ ucwords($users->status) }}</span></b>
                    </h2>
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Student Details</h1>
                    <h2 class="text-lg mb-1">First Name: {{ $students->fname }}</h2>
                    <h2 class="text-lg mb-1">Last Name: {{ $students->lname }}</h2>
                    <h2 class="text-lg mb-1">Date of Birth: {{ $students->dob }}</h2>
                    <h2 class="text-lg mb-1">Gender: {{ $students->gender }}</h2>
                    <h2 class="text-lg">Category: {{ $students->category }}</h2>
                    <h2 class="text-lg">Last Updated: {{ $students->updated_at }}</h2>
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Parent Details</h1>
                    <h2 class="text-lg mb-1">First Name: {{ $parents->fname }}</h2>
                    <h2 class="text-lg mb-1">Last Name: {{ $parents->lname }}</h2>
                    <h2 class="text-lg mb-1">Email: {{ $parents->email }}</h2>
                    <h2 class="text-lg mb-1">Phone: {{ $parents->phone }}</h2>
                    <h2 class="text-lg mb-1">Address: {{ $parents->address }}</h2>
                    <h2 class="text-lg mb-1">City: {{ $parents->city }}</h2>
                    <h2 class="text-lg mb-1">State: {{ $parents->state }}</h2>
                    <h2 class="text-lg mb-1">Zip: {{ $parents->zip }}</h2>
                    <h2 class="text-lg">Country: {{ $parents->country }}</h2>

                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Enrollment Details</h1>
                    <h2 class="text-lg">Enrollment Date: {{ $enrollments->enroll_date }}</h2>
                </div>

                <div class="mb-8">
                    <h1 class="text-2xl font-semibold mb-2">Grade and Class Details</h1>
                    <h2 class="text-lg">Class : {{ $grades->grade_name }} {{ $classes->class_name }}</h2>
                </div>

            </div>
        </div>
    </div>








</x-app-layout>
