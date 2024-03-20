<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h2>Books</h2>
        <a class="btn btn-primary" href="{{ route('books.create') }}" role="button" aria-disabled="true">Add Book</a> 
        <table id="books-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Genre</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ optional($book->genre)->name }}</td>
                    <td>{{ $book->price }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>
                        @foreach (explode(',', $book->img_path) as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt="Book Image" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                    <a href="{{ route('books.delete', $book->id) }}" onclick="return confirm('Are you sure you want to delete this book?')"><i class="fas fa-trash" style="color:red"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#books-table').DataTable();
    });
</script>
