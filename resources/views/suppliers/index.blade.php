@extends('../admin/dashboard')
@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
  
</head>

<style>
    body {
        color: white;
        margin-left: 25rem;
        margin-top: 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container-main {
        background-color: #EEE9DA;
        padding: 40px;
        margin-left: -25rem;
        height: 667px;
    }

    .inner-container {
        background-color: #967E76;
        padding: 20px;
        border-radius: 5px;
        margin-left: -2px;
        height: 600px;
    }

    .table-full-width {
        width: 100%;
        font-size: 16px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    table.dataTable thead th {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    table.dataTable tbody td {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: rgb(0, 0, 0); 
        text-align: center;
    }

    table.dataTable thead .sorting {
        color: rgb(0, 0, 0); 
    }

    h2 {
        margin-top: 25px;
        margin-bottom:10px;
        color: white;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .btn-primary {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-color: #b94f4fe2;
        color: white;
        border-color: #50320de2;
        margin-top: 10px;
        margin-bottom: -10px;
    }

    .p {
        color: rgb(250, 250, 250);
        margin-top: -15px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .table-responsive {
        overflow: auto;
    }

    div.dataTables_wrapper div.dataTables_filter input {
        color: rgb(0, 0, 0) !important; 
        background-color: #ffffff !important; 
    }
</style>
<body>
    <div class="container-main">
        <div class="inner-container">
    <div class="container">
        <h2>Supplier Lists</h2>
        <p>Maintain a record of all suppliers</p>
        <a class="btn btn-primary" href="{{ route('suppliers.create') }}" role="button" aria-disabled="true">Add Supplier</a><br> <br>
        <table id="suppliers-table" class="table">
            <thead class="text-center">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Transaction Date</th>
                    <th>Quantity</th>
                    <th>Book</th>
                    <th>Images</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->transactiondate }}</td>
                    <td>{{ $supplier->quantity }}</td>
                    <td>{{ $supplier->book ? $supplier->book->name : 'No Book Associated' }}</td>
    <td>
                        @foreach (explode(',', $supplier->img_path) as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt="Supplier Image" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('suppliers.edit', $supplier->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('suppliers.delete', $supplier->id) }}"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this supplier?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#suppliers-table').DataTable();
        });
    </script>
</body>
</html>

@endsection