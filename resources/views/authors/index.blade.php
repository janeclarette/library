<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>

</head>
<body>
    <div class="container">
        <h2>Author Index</h2>
        <a class="btn btn-primary" href="{{ route('authors.create') }}" role="button" aria-disabled="true">Add Author</a>
        <table id="authors-table" class="table">
        <thead>
                <tr>
                    <th>Author ID</th>
                    <th>Name</th>
                    <th>Date of Birth</th>
                    <th scope="col">Images</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->date_of_birth }}</td>
                    <td>
                        @foreach ($author->imgPaths as $imgPath)
                            <img src="{{ asset($imgPath) }}" alt="Author Image" style="max-width: 100px; max-height: 100px; margin-right: 10px;">
                        @endforeach
                    </td>
                    <td>
                    <a href="{{ route('authors.edit', $author->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <a href="{{ route('authors.delete', $author->id) }}" onclick="return confirm('Are you sure you want to delete this author?')"><i class="fas fa-trash" style="color:red"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#authors-table').DataTable();
    });
</script>