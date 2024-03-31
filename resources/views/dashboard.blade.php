<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>User Dashboard</title>
    <style>
        .product-container {
            position: relative; /* Ensure the container is positioned relative to its parent */
            background: #967E76;
            border-bottom: 1px solid #000;
            padding: 20px;
            text-align: center;
            border-radius:30px;
            height: 550px;
            
        }

        .image-container {
            position: relative;
            width: 100%;
            height: 200px; /* Adjust as per your requirement */
        }

        .image-container img {
            display: none;
            border-radius:30px;
        }

        .image-container img.active {
            display: block;
        }

        .prev-btn,
        .next-btn {
            width: 40px;
            height: 40px;
            line-height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #fff;
            font-size: 18px;
            border: none;
            cursor: pointer;
        }

        .prev-btn:hover,
        .next-btn:hover {
            background-color: rgba(0, 0, 0, 0.7);
        }

        .indicators {
            margin-top: 10px;
        }

        .indicator {
            width: 6px;
            height: 6px;
            background-color: #ccc;
            border-radius: 50%;
            display: inline-block;
            margin: 0 3px;
            cursor: pointer;
        }

        .indicator.active {
            background-color: #000;
        }
        .container-buttons {
    position: absolute;
    bottom: 20px; /* Adjust the value as needed */
    left: 50%;
    transform: translateX(-50%);
}

.container-buttons button {
    margin: 5px; /* Add some spacing between buttons if needed */
}

.product-container h3 {
    font-size: 1.2rem; /* Adjust the font size as needed */
    color: white;
    font-family: 'Montserrat', sans-serif;
    text-transform: capitalize;
    font-weight: bold;
}
.bg-overall{
    background: #EEE3CB;
}
    

</style>
</head>
<body>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black leading-tight">
            {{ __("You're logged in!") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-overall overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                {{-- <div class = "text-container"> --}}
                    <h2 class="col-span-full" style="font-size: 25px;">Available Books</h2> 
                {{-- </div> --}}
                    @foreach ($books as $book)
                        <div class="product-container border-b mb-2 pb-2 flex flex-col items-center">
                            <div class="image-container relative">
                                @foreach (explode(',', $book->img_path) as $index => $imagePath)
                                    <img src="{{ asset($imagePath) }}" alt="{{ $book->name }}" class="w-full h-full object-cover {{ $index === 0 ? 'active' : '' }}">
                                @endforeach
                                <button class="prev-btn absolute top-1/2 left-0 transform -translate-y-1/2 bg-rose-950 hover:bg-gray-700 text-white font-bold px-4 rounded-xl">
                                    &lt;
                                </button>
                                <button class="next-btn absolute top-1/2 right-0 transform -translate-y-1/2 bg-rose-950 hover:bg-gray-700 text-white font-bold  px-4 rounded-xl ">
                                    &gt;
                                </button>
                            </div>
                            <div class="indicators">
                                @foreach (explode(',', $book->img_path) as $index => $imagePath)
                                    <span class="indicator"></span>
                                @endforeach
                            </div>
                            <h3>{{ $book->name }}</h3>
                            <p>Price: ${{ $book->price }}</p>
                            <!-- Check if suppliers exist before looping -->
                            @foreach ($book->suppliers as $supplier)
                                <p>Quantity Supplied: {{ $supplier->quantity }}</p>
                            @endforeach
                            <p>Author: {{ $book->author->name }}</p>
                            <p>Genre: {{ $book->genre->name }}</p>
                            <div class="container-buttons">   
                                <form action="{{ route('cart.add', $book->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-rose-950 hover:bg-orange-950 text-white font-bold py-2 px-4 rounded">
                                        Add to Cart
                                    </button>
                                </form>
                                <button class="bg-rose-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                    <a href="{{ route('viewproduct', $book->id) }}">View Details</a>
                                </button>
                            </div>    
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const prevBtns = document.querySelectorAll('.prev-btn');
        const nextBtns = document.querySelectorAll('.next-btn');

        prevBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const container = btn.parentElement;
                const images = container.querySelectorAll('img');
                const currentIndex = getCurrentIndex(images);
                const newIndex = (currentIndex === 0) ? images.length - 1 : currentIndex - 1;
                toggleImage(images, currentIndex, newIndex);
                updateIndicators(container, newIndex);
            });
        });

        nextBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                const container = btn.parentElement;
                const images = container.querySelectorAll('img');
                const currentIndex = getCurrentIndex(images);
                const newIndex = (currentIndex === images.length - 1) ? 0 : currentIndex + 1;
                toggleImage(images, currentIndex, newIndex);
                updateIndicators(container, newIndex);
            });
        });

        function getCurrentIndex(images) {
            for (let i = 0; i < images.length; i++) {
                if (images[i].classList.contains('active')) {
                    return i;
                }
            }
            return -1; // No image is currently displayed
        }

        function toggleImage(images, currentIndex, newIndex) {
            images[currentIndex].classList.remove('active');
            images[newIndex].classList.add('active');
        }

        function updateIndicators(container, index) {
            const indicators = container.querySelectorAll('.indicator');
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
        }
    });
</script>

</body>
</html>
