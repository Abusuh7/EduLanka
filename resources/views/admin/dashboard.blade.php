<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-4 max-w-7xl">
        <!-- Dashboard Section -->
        <div class="grid grid-cols-2 gap-6 mt-6 bg-blue-100 rounded-lg shadow p-6">
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-blue-600">Total Number Of Students</h2>
                <p class="text-3xl font-bold">{{ $totalStudents }}</p> <!-- Replace with actual student count -->
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-blue-600">Number of Primary Students</h2>
                <p class="text-3xl font-bold">{{ $primaryStudentCount }}</p> <!-- Replace with actual student count -->
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-blue-600">Number of Secondary Students</h2>
                <p class="text-3xl font-bold">{{ $secondaryStudentCount }}</p> <!-- Replace with actual teacher count -->
            </div>
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-xl font-semibold mb-4 text-blue-600">Total Number Of Teachers</h2>
                <p class="text-3xl font-bold">{{ $teacherCount }}</p> <!-- Replace with actual student count -->
            </div>
        </div>

        <!-- Buttons Section -->
        <div class="flex justify-center mt-6 space-x-6">
            <button type="button" id="showStudentBtn" class=" text-white btn btn-primary rounded-full px-6 py-3 text-lg bg-gray-600 hover:bg-blue-500">
                Add New Student
            </button>
            <button type="button" id="showTeacherBtn" class="text-white btn btn-primary rounded-full px-6 py-3 text-lg bg-gray-600 hover:bg-blue-500">
                Add New Teacher
            </button>
        </div>
    </div>

        <!--Student Modal Form -->
    <div class="max-w-md mx-auto hidden" id="newStudentFormContainer">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Create New Student</h2>
            <form action="{{ route('studentCreate') }}" method="post" class="space-y-6">
                @csrf
                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">Student Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="fname" class="block text-sm font-medium">First Name</label>
                            <input type="text" id="fname" name="fname" required
                                   class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="lname" class="block text-sm font-medium">Last Name</label>
                            <input type="text" id="lname" name="lname" required
                                   class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                            <input type="date" id="dob" name="dob" required
                                   class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium">Gender</label>
                            <select id="gender" name="gender"
                                    class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                    required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-6">
                        <label for="primary" class="block text-sm font-medium">Primary or Secondary</label>
                        <select id="primary" name="category" required
                                class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                            <option value="" disabled>Select Primary or Secondary</option>
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-6">
                        <div>
                            <label for="grade_id" class="block text-sm font-medium">Grade</label>
                            <select id="grade_id" name="grade_id" required
                                    class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                <option value="" disabled selected>Select Grade</option>
                                @foreach($grades as $grade)
                                    <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="class_id" class="block text-sm font-medium">Class</label>
                            <select id="class_id" name="class_id" required
                                    class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                <option value="" disabled selected>Select Class</option>
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->class_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </section>



                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">Parent Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="parent_fname" class="block text-sm font-medium">First Name</label>
                            <input type="text" id="parent_fname" name="parent_fname" required
                                   class="mt-1 block w-full p-1.5 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_lname" class="block text-sm font-medium">Last Name</label>
                            <input type="text" id="parent_lname" name="parent_lname" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_email" class="block text-sm font-medium">Email</label>
                            <input type="email" id="parent_email" name="parent_email" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_phone" class="block text-sm font-medium">Phone</label>
                            <input type="tel" id="parent_phone" name="parent_phone" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_address" class="block text-sm font-medium">Address</label>
                            <input type="text" id="parent_address" name="parent_address" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_city" class="block text-sm font-medium">City</label>
                            <input type="text" id="parent_city" name="parent_city" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_state" class="block text-sm font-medium">State</label>
                            <input type="text" id="parent_state" name="parent_state" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_zip" class="block text-sm font-medium">Zip</label>
                            <input type="number" id="parent_zip" name="parent_zip" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="parent_country" class="block text-sm font-medium">Country</label>
                            <input type="text" id="parent_country" name="parent_country" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>
                </section>

                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">Enrollment Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="enroll_date" class="block text-sm font-medium">Enrollment Date:</label>
                            <input type="date" id="enroll_date" name="enroll_date" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>
                </section>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-opacity-50">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>




    <!-- Teacher Form Modal -->
    <div class="max-w-md mx-auto hidden" id="newTeacherFormContainer">
        <div class="bg-white rounded-lg shadow p-6">
            <h2 class="text-xl font-semibold mb-4">Create New Teacher</h2>
            <form action="{{ route('teacherCreate') }}" method="post" class="space-y-6">
                @csrf

                <!-- Teacher Details Section -->
                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">Teacher Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="fname" class="block text-sm font-medium">First Name</label>
                            <input type="text" id="fname" name="fname" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="lname" class="block text-sm font-medium">Last Name</label>
                            <input type="text" id="lname" name="lname" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="dob" class="block text-sm font-medium">Date of Birth</label>
                            <input type="date" id="dob" name="dob" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium">Personal Email</label>
                            <input type="email" id="email" name="email" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="gender" class="block text-sm font-medium">Gender</label>
                            <select id="gender" name="gender"
                                    class="mt-1 block w-full p-1.5 py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50"
                                    required>
                                <option value="">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>




                        <!-- Dropdown -->
                        <div class="mb-4">
                            <label for="subject" class="block text-sm font-medium">Subject</label>
                            <select id="subject_id" name="subject_id" required
                                    class="mt-1 block w-full p-1.5 py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                <option value="" disabled selected>Select Subject</option>
                                @foreach($subjects as $subject)

                                    <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>

                                @endforeach

                            </select>
                        </div>
                            <div class="mb-4">
                                <label for="grade_id" class="block text-sm font-medium">Grade</label>
                                <select id="grade_id" name="grade_id" required
                                        class="mt-1 block w-full p-1.5 py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                    <option value="" disabled selected>Select Grade</option>
                                    @foreach($grades as $grade)

                                        <option value="{{ $grade->id }}">{{ $grade->grade_name }}</option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="class_id" class="block text-sm font-medium">Class</label>
                                <select id="class_id" name="class_id" required
                                        class="mt-1 block w-full p-1.5 py-2 px-3 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                                    <option value="" disabled selected>Select Class</option>
                                   @foreach($classes as $class)

                                       <option value="{{ $class->id }}">{{ $class->class_name }}</option>

                                   @endforeach

                                </select>
                            </div>
                        </div>
                    </section>

                <!-- More Details Section -->
                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">More Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium">Phone</label>
                            <input type="number" id="phone" name="phone" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="address" class="block text-sm font-medium">Address</label>
                            <input type="text" id="address" name="address" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="city" class="block text-sm font-medium">City</label>
                            <input type="text" id="city" name="city" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="state" class="block text-sm font-medium">State</label>
                            <input type="text" id="state" name="state" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="zip" class="block text-sm font-medium">Zip</label>
                            <input type="number" id="zip" name="zip" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="country" class="block text-sm font-medium">Country</label>
                            <input type="text" id="country" name="country" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>
                </section>

                <!-- Enrollment Details Section -->
                <section>
                    <h3 class="text-blue-700 text-lg font-semibold mb-2">Enrollment Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="enroll_date" class="block text-sm font-medium">Enrollment Date:</label>
                            <input type="date" id="enroll_date" name="enroll_date" required
                                   class="mt-1 block w-full p-1.5 border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50">
                        </div>
                    </div>
                </section>

                <div class="mt-8">
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-opacity-50">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

