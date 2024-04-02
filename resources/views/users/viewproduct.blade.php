<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-semibold text-gray-900 leading-tight">
            {{ __("Book Details") }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6">
                    <!-- Display the images horizontally at the top -->
                    <div class="flex justify-center items-center mb-6">
                        @foreach (explode(',', $book->img_path) as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt="{{ $book->name }}" class="w-64 h-64 mr-4">
                        @endforeach
                    </div>

                    <!-- Display all information below the images -->
                    <div class="flex flex-col md:flex-row">
                        <div class="md:mr-8 mb-6 md:mb-0">
                            <h2 class="text-2xl font-semibold mb-4">{{ $book->name }}</h2>
                            <p class="mb-2">{{ $book->description }}</p>
                            <div class="mb-2">
                                <span class="font-semibold">Author:</span>
                                <span>{{ $book->author->name }}</span>
                            </div>
                            <div class="mb-2">
                                <span class="font-semibold">Genre:</span>
                                <span>{{ $book->genre->name }}</span>
                            </div>

                            <div class="mb-2">
                                <span class="font-semibold">Available:</span>
                                @foreach ($book->suppliers as $supplier)
                                    <span>{{ $supplier->quantity }}</span>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <span class="font-semibold">Price:</span>
                                <span>${{ $book->price }}</span>
                            </div>
                    @if($orderReview)
                        <div class="mb-4">
                            <h3 class="text-xl font-semibold mb-2">Order Review</h3>
                            <p>{{ $orderReview->comment }}</p>
                        </div>
                    @else
                        <p>No review available for this order.</p>
                    @endif
                            <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
