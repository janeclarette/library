<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Shopping Cart") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if($cartItems->isNotEmpty())
                        <ul class="list-group">
                            @foreach($cartItems as $item)
                                <li class="list-group-item flex justify-between items-center">
                                    <div>
                                        <span class="badge">{{ $item->quantity }}</span>
                                        <strong>{{ $item->book->name }}</strong>
                                        <span class="label label-success">{{ $item->book->price }}</span>
                                    </div>
                                    <!-- Action buttons -->
                                    <div>
                                        <form action="{{ route('reduceByOne', $item->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">-</button>
                                        </form>
                                        <form action="{{ route('removeItem', $item->id) }}" method="POST" class="inline-block ml-1">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-xs">Remove</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h2>No Items in Cart!</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
