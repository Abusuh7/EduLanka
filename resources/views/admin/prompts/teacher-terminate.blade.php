<x-app-layout>


    <div x-data="{ isOpen: false, dropdownValue: '', otherReason: '' }" x-cloak class="fixed inset-0 flex items-center justify-center z-50">
        <div id="popup-modal" class="bg-white rounded-lg shadow p-4 max-w-md w-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    @click="isOpen = false; window.history.back()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <!-- Modal content here -->
                    <form action="{{ route('terminateTeacherConfirm', $users->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-5">
                            <label for="reason"
                                class="block mb-1 text-xs font-medium text-gray-600 dark:text-gray-400">Reason for
                                deletion</label>
                            <select x-model="dropdownValue" id="reason" name="reason"
                                class="block w-full px-4 py-3 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm appearance-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:ring-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300">
                                <option value="" disabled>Select a reason</option>
                                {{-- <option value="alumni">Alumni</option> --}}
                                <option value="leaving">Leaving</option>
                                {{-- <option value="expelled">Expelled</option> --}}
                                <option value="suspended">Suspended</option>
                                <option value="fired">Fired</option>
                            </select>
                        </div>
                        <div class="mb-5">
                            <label for="comment"
                                class="block mb-1 text-xs font-medium text-gray-600 dark:text-gray-400">Comment</label>
                            <input x-model="otherReason" id="comment" name="comment" type="text"
                                class="block w-full px-4 py-3 text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm appearance-none dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:focus:ring-gray-600 focus:outline-none focus:ring-4 focus:ring-gray-300">
                        </div>
                        <button type="submit"
                            :disabled="dropdownValue === '' && (!otherReason || otherReason.trim() === '')"
                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
