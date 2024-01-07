<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('URLS') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <!-- {{ __("You're logged in") }} -->

                <form action="{{ route('urls.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="text-xl text-white-600">Original URL<span class="text-red-500">*</span></label></br>
                        <input type="text" class="text-gray-800 border-2 border-gray-300 p-2 w-full rounded" name="url" id="url" value="" required>
                    </div>
                    <div class="mb-4">
                        <label class="text-xl text-white-600">Description<span class="text-red-500">*</span></label></br>
                        <input type="text" class=" text-gray-800 border-2 border-gray-300 p-2 w-full rounded" name="description" id="description" value="" required>
                    </div>
                    <div class="flex p-1">
                        <button role="submit" class="p-3 bg-blue-500 text-white hover:bg-blue-400 rounded" required>Submit</button>
                    </div>
                </form>
                @if ($urls != null)
                <div class="w-full">
                    <div class="flex justify-between bg-gray-800 px-16 py-2 text-gray-300">
                        <div>URL Description</div>
                        <div>Short URL</div>
                        <div>Actions</div>
                    </div>
                    @foreach ($urls as $url)
                        <div class="flex justify-between items-center bg-gray-700 border-4 border-gray-200 rounded px-16 py-2 my-2">
                            <div class="flex-1">
                                {{ $url->description }}
                            </div>
                            <div class="flex-1">
                                <a href="{{ $url->url }}" target="_blank" class="text-blue-500 hover:text-blue-400">
                                    {{ $url->short_url }}
                                </a>
                            </div>
                            <div class="flex-1 flex justify-end">
                                <a href="{{ route('urls.edit', ['url' => $url->id]) }}" class="text-green-500 hover:text-green-400 mr-4">Update</a>
                                <form action="{{ route('urls.destroy', ['url' => $url->id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-400">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>