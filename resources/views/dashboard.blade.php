<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        <!--<form action="{{ route('admin.dashboard')}}" method="GET">
            <input type="text" name="search" placeholder="Search Book">
            <button type="submit">Search</button>
        </form>-->

        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
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
        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="addToCart({{ $book->id }})">
            Add to Cart
        </button>
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

<script>
    function addToCart(bookId) {
        // Get the quantity value
        var quantity = $('#quantity_' + bookId).val();

        // Send an AJAX request to the controller method
        $.ajax({
            type: 'POST',
            url: '{{ route("cart.add") }}',
            data: {
                _token: '{{ csrf_token() }}', // Add CSRF token for security
                book_id: bookId,
                quantity: quantity, // Include the quantity in the request data
            },
            success: function(response) {
                // Handle the success response, such as displaying a success message
                alert(response.message);
            },
            error: function(xhr, status, error) {
                // Handle errors, such as displaying an error message
                console.error(error);
            }
        });
    }
</script>
