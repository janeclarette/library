@component('mail::message')

# Order Receipt

Thank you for your order! Below is the receipt for your recent purchase.

<p>Order ID: {{ $order->id }}</p>

<p>Date Ordered: {{ $order->date_ordered }}</p>

<p>Payment Method: {{ $order->payment_method }}</p>

<p>Courier: {{ $order->courier }}</p>

<p>Total Price: ${{ $totalPrice }}</p>

@if(isset($pdfPath))
    <p>You can download the detailed receipt as a PDF using the link below:</p>
    @component('mail::button', ['url' => Storage::url($pdfPath)])
    Download Receipt
    @endcomponent
@else
    <p>Sorry, the receipt PDF is not available at the moment.</p>
@endif

@endcomponent
