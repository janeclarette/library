@extends('../admin/dashboard')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h2>Suppliers</h2>
        <a class="btn btn-primary" href="{{ route('suppliers.create') }}" role="button" aria-disabled="true">Add Supplier</a><br> <br>
        <table id="suppliers-table" class="table">
            <thead>
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
                    <td>
                        <a href="{{ route('suppliers.edit', $supplier->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('suppliers.delete', $supplier->id) }}" onclick="return confirm('Are you sure you want to delete this supplier?')"><i class="fas fa-trash" style="color:red"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#suppliers-table').DataTable();
        });
    </script>
</body>
</html>

@endsection