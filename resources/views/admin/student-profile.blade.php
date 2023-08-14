<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $users->name }}'s Profile
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="max-w-6xl mx-auto py-8 px-4">
            <div class="bg-white rounded-lg shadow-md p-6 space-y-6">

                <!-- User Details Section -->
                <div>
                    <h1 class="text-2xl font-semibold mb-3">User Details</h1>
                    <dl class="grid grid-cols-2 gap-4">
                        <div class="font-semibold text-gray-600">Name</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $users->name }}</div>
                        <div class="font-semibold text-gray-600">Email</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $users->email }}</div>
                        <div class="font-semibold text-gray-600">Role</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $users->role }}</div>
                        <div class="font-semibold text-gray-600">Status</div>
                        <div class="bg-gray-200 p-2 rounded-md">
                            <b>
                                <span class="{{ $users->status === 'deactivated' ? 'text-red-500' : 'text-green-500' }}">
                                    {{ ucwords($users->status) }}
                                </span>
                            </b>
                        </div>
                    </dl>
                </div>

                <!-- Student Details Section -->
                <div>
                    <h1 class="text-2xl font-semibold mb-3">Student Details</h1>
                    <dl class="grid grid-cols-2 gap-4">
                        <div class="font-semibold text-gray-600">First Name</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->fname }}</div>
                        <div class="font-semibold text-gray-600">Last Name</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->lname }}</div>
                        <div class="font-semibold text-gray-600">Date of Birth</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->dob }}</div>
                        <div class="font-semibold text-gray-600">Gender</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->gender }}</div>
                        <div class="font-semibold text-gray-600">Category</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->category }}</div>
                        <div class="font-semibold text-gray-600">Last Updated</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $students->updated_at }}</div>
                    </dl>
                </div>

                <!-- Parent Details Section -->
                <div>
                    <h1 class="text-2xl font-semibold mb-3">Parent Details</h1>
                    <dl class="grid grid-cols-2 gap-4">
                        <div class="font-semibold text-gray-600">First Name</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->fname }}</div>
                        <div class="font-semibold text-gray-600">Last Name</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->lname }}</div>
                        <div class="font-semibold text-gray-600">Email</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->email }}</div>
                        <div class="font-semibold text-gray-600">Phone:</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->phone }}</div>
                        <div class="font-semibold text-gray-600">Address</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->address }}</div>
                        <div class="font-semibold text-gray-600">City</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->city }}</div>
                        <div class="font-semibold text-gray-600">State</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->state }}</div>
                        <div class="font-semibold text-gray-600">Zip</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->zip }}</div>
                        <div class="font-semibold text-gray-600">Country</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $parents->country }}</div>
                    </dl>
                </div>

                <!-- Enrollment Details Section -->
                <div>
                    <h1 class="text-2xl font-semibold mb-3">Enrollment Details</h1>
                    <dl class="grid grid-cols-2 gap-4">
                        <div class="font-semibold text-gray-600">Enrollment Date</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $enrollments->enroll_date }}</div>
                    </dl>
                </div>

                <!-- Grade and Class Details Section -->
                <div>
                    <h1 class="text-2xl font-semibold mb-3">Grade and Class Details</h1>
                    <dl class="grid grid-cols-2 gap-4">
                        <div class="font-semibold text-gray-600">Class</div>
                        <div class="bg-gray-200 p-2 rounded-md">{{ $grades->grade_name }} {{ $classes->class_name }}</div>
                    </dl>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
