<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Book Details") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex">
                    <div class="mr-8">
                        <!-- Display all information on the left side -->
                        <h2>{{ $book->name }}</h2>
                        <h2>{{ $book->description }}</h2>
                        <p>Author: {{ $book->author->name }}</p>
                        <p>Genre: {{ $book->genre->name }}</p>
                        @foreach ($book->suppliers as $supplier)
                                <p>Available: {{ $supplier->quantity }}</p>
                            @endforeach
                        <p>Price: ${{ $book->price }}</p>
                        <form action="{{ route('cart.add', $book->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                    <div>
                        <!-- Display the image on the right side -->
                        @foreach (explode(',', $book->img_path) as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt="{{ $book->name }}" class="w-64 h-64 mb-2">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
