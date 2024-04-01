@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <!-- Include your CSS stylesheets here -->
    <style>
        body {
            color: #333;
            background-color: #f4f4f4;
        }

        .container-main {
            background-color: #EEE9DA;
            padding: 40px; 
            border-radius: 10px; 
            margin-left: -78rem;
            height: 667px;
        }

        .inner-container {
            background-color: #978D8D; 
            padding: 20px; 
            border-radius: 5px; 
            margin-left: 90rem;
            height: 600px;
            overflow-y: auto;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table th {
            background-color: #f2f2f2;
        }

        table tbody tr:hover {
            background-color: #f5f5f5;
        }

        h2 {
            color: #ffffff;
            margin-bottom: 20px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin-top: 5px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }
        .pclass{
            color:white;
            margin-top: -15px;
        }
    </style>
</head>
<body>  
    <div class="container-main">
    <div class="inner-container"> 
            <div class="container-fluid" style="height: 50vh;">
            <div class="col-md-12 mt-4"> 
            <h2>Order Lists</h2>
            <p class="pclass"> Manage customer orders</p>
            
            <div class="table-responsive">

            <table id="authors-table" class="table table-bordered table-striped">

                <thead class="bg-gradient-primary text-center text-white">
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Date Ordered</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->date_ordered }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('admin.orders.edit', $order->id) }}" class="btn">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- Include your JavaScript scripts here -->
</body>
</html>
