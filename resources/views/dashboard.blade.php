<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("You're logged in!") }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>Available Books</h2>
                    @foreach ($books as $book)
                        <div class="border-b mb-2 pb-2">
                            @foreach (explode(',', $book->img_path) as $imagePath)
                                <img src="{{ asset($imagePath) }}" alt="{{ $book->name }}" class="w-20 h-20 mb-2">
                            @endforeach
                            <h3>{{ $book->name }}</h3>
                            <p>Price: ${{ $book->price }}</p>
                            <!-- Check if suppliers exist before looping -->
                            @foreach ($book->suppliers as $supplier)
                                <p>Quantity Supplied: {{ $supplier->quantity }}</p>
                            @endforeach

                            <p>Author: {{ $book->author->name }}</p>
                            <p>Genre: {{ $book->genre->name }}</p>
                            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Add to Cart
                                </button>
                            </form>
                            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                <a href="">View Details</a>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
