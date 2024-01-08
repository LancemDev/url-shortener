<x-app-layout>
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
</x-app-layout>