<x-app-layout>

    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Banner Preview') }}
        </h2>
    </x-slot> --}}


    <div class="container  w-2/4 mx-auto px-4 py-4 border">
        <div class="flex flex-col">
            <div class="container flex justify-between">
                <div class="flex flex-row justify-between items-center">
                    <h2 class="text-2xl font-bold">Edit Banner</h2>

                </div>
                <button id="closeFormButton" class="text-gray-500 hover:text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="h-6 w-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>

            </div>


            <div class="flex flex-col mt-4">
                <form action="{{ route('updateBanner', $banner->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="flex flex-col">
                        <label for="title" class="text-sm text-gray-500">Title</label>
                        <input type="text" name="title" id="title" value="{{ $banner->title }}"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Title" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="caption" class="text-sm text-gray-500">Caption</label>
                        <input type="text" name="caption" id="caption" value="{{ $banner->caption }}"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Caption" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="image" class="text-sm text-gray-500">Image</label>
                        <input type="file" name="image" id="image"
                            class="border border-gray-300 rounded-md p-2 mt-2">
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="button_name" class="text-sm text-gray-500">Button Name</label>
                        <input type="text" name="button_name" id="button_name" value="{{ $banner->button_name }}"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Button" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="link" class="text-sm text-gray-500">Link</label>
                        <input type="text" name="link" id="link" value="{{ $banner->link }}"
                            class="border border-gray-300 rounded-md p-2 mt-2" placeholder="Banner Link" required>
                    </div>
                    <div class="flex flex-col mt-4">
                        <label for="visibility" class="text-sm text-gray-500">Visibility</label>
                        <select name="visibility" id="visibility" class="border border-gray-300 rounded-md p-2 mt-2"
                            required>
                            <option value="{{ $banner->visibility }}" disabled selected>Choose Visibility</option>
                            <option value="primarystu">Primary Students Only</option>
                            <option value="secondarystu">Secondary Students Only</option>
                            <option value="bothstu">Students Only</option>
                            <option value="teacher">Teachers Only</option>
                            <option value="all">All</option>
                        </select>
                    </div>


                    <div class="flex flex-col mt-4">
                        <label for="status" class="text-sm text-gray-500">Status</label>
                        <select name="status" id="status" class="border border-gray-300 rounded-md p-2 mt-2"
                            required>
                            <option value="{{ $banner->status }}" disabled selected>Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                    <div class="flex flex-col mt-4">
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition duration-300">Edit
                            Banner</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
