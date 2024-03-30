@extends('../admin/dashboard')
@section('content')

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

    <style>
        body {
            color:white;
            margin-left: 230px;
            margin-top: 0px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    
        .container-main {
            background-color: #EEE9DA; 
            padding: 40px; 
            border-radius: 10px; 
            margin-left: -15rem;
            height: 667px;
        }
    
        .inner-container {
            background-color: #967E76; 
            padding: 20px; 
            border-radius: 5px;
            margin-left: 7px;
            height: 600px;
        }
    
        .table-full-width {
            width: 100%;
            font-size: 16px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    
        table.dataTable thead th {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            text-align: center; /* Center align the text in table headers */
        }
    
        table.dataTable tbody td {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            text-align: center; /* Center align the text in table cells */
        }
    
        h2 {
            margin-top:20px;
            margin-bottom: 30px;
            color: white;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    
        .btn-success {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #b94f4fe2; 
            color: white; 
            border-color: #50320de2; 
        }
    
        .p {
            color: rgb(250, 250, 250);
            margin-top: -25px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
    
        .table-responsive {
            overflow: auto;
        }
    </style>
    

<div class="container-main"> <!-- Light brown container -->
    <div class="inner-container"> 
    <div class="container">
        <h2>Genre Lists</h2>
        <p class="p"> Categorize and manage the various genres </p>
        <a class="btn btn-success mb-3" href="{{ route('genres.create') }}" role="button">Add Genre</a>

        <table id="genres-table" class="table table table-bordered table-striped">
            <thead class= "text-center">
                <tr>
                    <th >ID</th>
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
                    <td class ="text-center">
                        <a href="{{ route('genres.edit', $genre->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                    </td>
                    <td class= "text-center">
                        <form action="{{ route('genres.delete', $genre->id) }}"  method="POST" onsubmit="return confirm('Are you sure you want to delete this genre?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></i></button>
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

@endsection