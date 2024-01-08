<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('URLS') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg"> -->
                <div class="p-6 text-gray-900 dark:bg-gray-800 dark:text-gray-100">
                    @if ($url != null)
                        <form action="{{ route('urls.update', ['url' => $url->id]) }}" method="POST" class="p-10 bg-gray-900 rounded shadow-xl">
                            @csrf
                            @method('PATCH')
                            <div class="mb-4">
                                <label class="text-xl text-white-600">Original URL<span class="text-red-500">*</span></label></br>
                                <input type="text" class="text-gray-800 border-2 border-gray-300 p-2 w-full rounded" name="url" id="url" value="{{ $url->url }}" required>
                            </div>
                            <div class="mb-4">
                                <label class="text-xl text-white-600">Description<span class="text-red-500">*</span></label></br>
                                <input type="text" class=" text-gray-800 border-2 border-gray-300 p-2 w-full rounded" name="description" id="description" value="{{ $url->description }}" required>
                            </div>
                            <div class="flex p-1">
                                <input type="submit" value="Update" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded">
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>