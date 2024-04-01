@include('../admin/dashboard')

<!-- admin/orders/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        body{
            margin-left: 250px;
            margin-right: 200px;
            color: white;
            user-select: none;
             font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    
            .container-main {
                width:83rem;
                background-color: #EEE9DA; /* Light Brown color */
                padding: 30px;
                margin-left: -50px;
                margin-top: -23px;
                height: 690px;
            }
    
            .inner-container {
                background-color: #978D8D; /* Light Gray color */
                padding: 50px; /* Padding for the inner container */
                border-radius: 5px; /* Rounded corners for the inner container */
                margin-left: 1px;
                height: 600px;
                margin-top: 23px;
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            }
    
    
            h2 {
                color: white;
                /* margin-top: 2px; */
                font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            }

    
            .table-responsive {
                overflow: auto;
            }
    
            .btn-primary{
                margin-top: 10px;
                background-color: #b94f4fe2;
                border-color: #4B0000;
            }
            .btn-primary:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
        }
    
    </style>
<body>
    <div class="container-main">
        <div class="inner-container"> 
    <div class="container">
        <h2>Edit Order Status</h2>
        <form action="{{ route('admin.orders.update', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="status">Update Status:</label>
                <select name="status" id="status" class="form-control">
                    <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                    <option value="Processing" {{ $order->status === 'Processing' ? 'selected' : '' }}>Processing</option>
                    <option value="Shipped" {{ $order->status === 'Shipped' ? 'selected' : '' }}>Shipped</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Status</button>
        </form>
    </div>

</body>
</html>
