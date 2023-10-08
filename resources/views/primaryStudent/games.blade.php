<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Educational Games') }}
        </h2>
    </x-slot>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <div class="flex flex-wrap justify-center gap-6 mt-4">

        <!-- Top Row -->
        <div class="flex justify-center w-full h-96 gap-10"> <!-- Increased the height to h-64 -->
            <!-- User Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-1/2">
                <iframe seamless="seamless" allowtransparency="true" allowfullscreen="true" frameborder="0" style="width: 100%;height: 100%;border: 0px;" src="https://zv1y2i8p.play.gamezop.com/g/B1PfyhpQ5Ar"> </iframe>
            </div>

            <!-- Student Category Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-1/2">
                <iframe seamless="seamless" allowtransparency="true" allowfullscreen="true" frameborder="0" style="width: 100%;height: 100%;border: 0px;" src="https://zv1y2i8p.play.gamezop.com/g/zMxz8LNrp"> </iframe>
            </div>
        </div>

        <!-- Bottom Row -->
        <div class="flex justify-center w-full mt-4 gap-6 h-96">
            <!-- User Counts by Month Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-1/2">
                <iframe seamless="seamless" allowtransparency="true" allowfullscreen="true" frameborder="0" style="width: 100%;height: 100%;border: 0px;" src="https://zv1y2i8p.play.gamezop.com/g/rkAXTzkD5kX"> </iframe>
            </div>

            <!-- Gender Chart Card -->
            <div class="bg-white p-4 rounded-lg shadow-md w-1/2">
                <iframe seamless="seamless" allowtransparency="true" allowfullscreen="true" frameborder="0" style="width: 100%;height: 100%;border: 0px;" src="https://zv1y2i8p.play.gamezop.com/g/r1K-J3TQ5Ar"> </iframe>
            </div>
        </div>

    </div>




</x-app-layout>
