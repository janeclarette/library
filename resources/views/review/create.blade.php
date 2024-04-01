<form action="{{ route('review.store') }}" method="POST">
    @csrf

    <input type="hidden" name="order_id" value="{{ $orderId }}">

    <label for="rating">Rating:</label>
    <input type="number" name="rating" id="rating" min="1" max="5" required>

    <label for="comment">Comment:</label>
    <textarea name="comment" id="comment" rows="3"></textarea>

    <button type="submit">Submit Review</button>
</form>