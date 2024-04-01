
<form action="{{ route('review.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    @csrf

    <input type="hidden" name="order_id" value="{{ $orderId }}" class="hidden">

    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="rating">
            Rating:
        </label>
        <input type="number" name="rating" id="rating" min="1" max="5" required
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    </div>

    <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="comment">
            Comment:
        </label>
        <textarea name="comment" id="comment" rows="3"
                  class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Submit Review
        </button>
    </div>
</form>