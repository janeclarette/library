@include('../admin/dashboard')

<!DOCTYPE html>
<html lang="en">

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
        margin-left: -230px;
        height: 667px;
    }

    .inner-container {
        background-color: #978D8D;
        padding: 20px;
        border-radius: 5px;
        margin-left: 27px;
        height: 600px;
        overflow-y: auto;
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
    }

    table.dataTable thead .sorting {
        color: rgb(0, 0, 0); 
    }

    .container h2.text-left {
    margin-top: 25px !important;
    margin-bottom: 0px !important;
    color: white;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .container .p {
        color: rgb(250, 250, 250);
        margin-top: -10px !important;
        margin-bottom: 0 !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .btn-primary {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-color: #b94f4fe2;
        color: white;
        border-color: #4B0000;
        margin-top: 0px;
        margin-bottom: 20px;
    }
    .btn-primary:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
        }
    

    

    .table-responsive {
        overflow: auto;
    }

    /* Adjust the search bar */
    div.dataTables_wrapper div.dataTables_filter input {
        color: rgb(0, 0, 0) !important; 
        background-color: #ffffff !imvportant; 
    }
</style>

<body>
    
    <div class="container-main">
        <div class="inner-container">
            <div class="container">
                <h2 class="text-left mb-4">Book Lists</h2>
                <p>Organize collection of books </p>
                <a href="{{ route('books.create') }}" role="button"  class=" btn btn-primary" aria-disabled="true">Add Book</a>
                
                
                
                
                <table id="books-table" class="table table-bordered table-striped">

                    <thead class=" bg-gradient-primary text-center">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Author</th>
                            <th>Genre</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($books as $book)
                        <tr class="text-center">
                            <td>{{ $book->id }}</td>
                            <td>{{ $book->name }}</td>
                            <td>{{ $book->description }}</td>
                            <td>{{ $book->author->name }}</td>
                            <td>{{ optional($book->genre)->name }}</td>
                            <td>{{ $book->price }}</td>
                            <td>
                                @foreach (explode(',', $book->img_path) as $imagePath)
                                    <img src="{{ asset($imagePath) }}" alt="Book Image" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td>
                                <a href="{{ route('books.delete', $book->id) }}" onclick="return confirm('Are you sure you want to delete this book?')" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            $('#books-table').DataTable({
                "paging": true,             // Enable pagination
                "lengthMenu": [10, 25, 50, 100],  // Define the entries per page options
                "pageLength": 10,           // Initial number of entries per page
                "ordering": true,
                "info": true,
                "columnDefs": [{ "orderable": false, "targets": [6, 7, 8] }]  // Disable ordering for specific columns
            });
        });
    </script>

</body>

</html>
