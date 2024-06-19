<x-guest-layout>
    <div class="container w-full px-5 py-6 mx-auto">
        <!-- Centered Search Form -->
        <div class="flex justify-center mb-6">
            <form action="{{ route('search') }}" method="GET" class="flex">
                <input type="text" name="query" placeholder="Search..." class="p-2 border rounded mr-2">
                <button type="submit" class="p-2 bg-yellow-800 text-white rounded">Search</button>
            </form>
        </div>

        <div class="grid lg:grid-cols-4 gap-y-6">
            @if(request()->has('query') && !empty(request()->query('query')))
                @if($results->count() > 0)
                    @foreach ($results as $result)
                        <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                            <img class="w-full h-48" src="{{ Storage::url($result->image) }}" alt="Image" />
                            <div class="px-6 py-4">
                                <a href="{{ route('categories.show', $result->id) }}">
                                    <h4 class="mb-3 text-xl font-semibold tracking-tight text-yellow-800 hover:text-zinc-400 uppercase">
                                        {{ $result->name }}
                                    </h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>No results found for your search.</p>
                @endif
            @else
                @foreach ($categories as $category)
                    <div class="max-w-xs mx-4 mb-2 rounded-lg shadow-lg">
                        <img class="w-full h-48" src="{{ Storage::url($category->image) }}" alt="Image" />
                        <div class="px-6 py-4">
                            <a href="{{ route('categories.show', $category->id) }}">
                                <h4 class="mb-3 text-xl font-semibold tracking-tight text-yellow-800 hover:text-zinc-400 uppercase">
                                    {{ $category->name }}
                                </h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-guest-layout>
