<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
        <h2>Genres</h2>
        <a class="btn btn-primary mb-3" href="{{ route('genres.create') }}" role="button">Add Genre</a>

        <table id="genres-table" class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Images</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($genres as $genre)
                <tr>
                    <td>{{ $genre->id }}</td>
                    <td>{{ $genre->name }}</td>
                    <td>{{ $genre->description }}</td>
                    <td>
                        @foreach (explode(',', $genre->img_path) as $imagePath)
                            <img src="{{ asset($imagePath) }}" alt="Genre Image" class="img-thumbnail mr-2" style="max-width: 100px; max-height: 100px;">
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ route('genres.edit', $genre->id) }}"><i class="fas fa-edit"></i></a>
                    </td>
                    <td>
                        <form action="{{ route('genres.delete', $genre->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this genre?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>
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
            $('#genres-table').DataTable();
        });
    </script>
</body>
</html>
