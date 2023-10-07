<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Analytics') }}
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="flex flex-wrap justify-center gap-6 mt-4">

        <!-- Top Row -->
        <div class="flex justify-center w-full gap-10">
            <!-- User Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-96">
                <canvas id="userChart" width="400" height="400"></canvas>
            </div>

            <!-- Student Category Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-96">
                <h2 class="text-xl font-semibold mb-4">Student Count by Category</h2>
                <canvas id="studentCategoryChart" width="400" height="400"></canvas>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="flex justify-center w-full mt-4 gap-6">
            <!-- User Counts by Month Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-96">
                <h2 class="text-xl font-semibold mb-4">User Counts by Month</h2>
                <canvas id="userCountsChart" width="400" height="400"></canvas>
            </div>

            <!-- Gender Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-96">
                <h2 class="text-xl font-semibold mb-4">Students by Gender</h2>
                <canvas id="genderChart" width="400" height="400"></canvas>
            </div>
        </div>

    </div>




    {{--    Students by gender--}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Retrieve the gender data from your PHP variable
            var genderData = {!! json_encode($genderData) !!};

            // Extract labels (genders) and values (counts)
            var genders = Object.keys(genderData);
            var counts = Object.values(genderData);

            var data = {
                labels: genders,
                datasets: [{
                    data: counts,
                    backgroundColor: ['#3498db', '#e74c3c'], // Blue for Male, Red for Female
                }]
            };

            var ctx = document.getElementById('genderChart').getContext('2d');
            var genderChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                },
            });
        });
    </script>




{{--    User Counts by Month--}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var userCountsByMonth = @json($userCountsByMonth);

            // Extract the month labels and user counts from the data
            var months = userCountsByMonth.map(function(item) {
                return item.month;
            });

            var counts = userCountsByMonth.map(function(item) {
                return item.count;
            });

            var data = {
                labels: months,
                datasets: [{
                    label: 'User Counts by Month',
                    data: counts,
                    fill: false, // To make it a line chart
                    borderColor: '#3498db', // Line color
                    borderWidth: 2, // Line width
                }]
            };

            var ctx = document.getElementById('userCountsChart').getContext('2d');
            var userCountsChart = new Chart(ctx, {
                type: 'line',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    scales: {
                        x: [{
                            type: 'time',
                            time: {
                                unit: 'month',
                            },
                            title: {
                                display: true,
                                text: 'Month',
                            },
                        }],
                        y: [{
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'User Count',
                            },
                        }],
                    },
                },
            });
        });
    </script>

{{--    User Counts by Month--}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetch the total number of teachers and students from your PHP variables
            var teachersCount = {{ count($teachers) }};
            var studentsCount = {{ count($students) }};

            // Create a data array for the chart with blue colors
            var data = {
                labels: ['Teachers', 'Students'],
                datasets: [{
                    data: [teachersCount, studentsCount],
                    backgroundColor: ['#5CD2E6', '#6499E9'], // Blue color for both segments
                }]
            };

            // Create a chart using Chart.js
            var ctx = document.getElementById('userChart').getContext('2d');
            var userChart = new Chart(ctx, {
                type: 'pie',
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                },
            });
        });
    </script>


{{--    Student Count by Category--}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var primaryCount = {{ $primaryCount }};
            var secondaryCount = {{ $secondaryCount }};

            var data = {
                labels: ['Primary', 'Secondary'],
                datasets: [{
                    data: [primaryCount, secondaryCount],
                    backgroundColor: ['#3498db', '#e74c3c'], // Blue for Primary, Red for Secondary
                }]
            };

            var ctx = document.getElementById('studentCategoryChart').getContext('2d');
            var studentCategoryChart = new Chart(ctx, {
                type: 'bar', // Change to 'bar' for a bar chart
                data: data,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                },
            });
        });
    </script>

</x-app-layout>
