@include('../admin/dashboard')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the styles.css file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
    <style>
        body
        {
            margin-left: 230px;
            margin-top: 0px;
        }
        </style>
</head>

<body>
    {{-- wtfff --}}
    <div class="container-fluid  " style="height: 50vh;">
        <div class="col-md-6 mt-4"> 


            <h2 class="text-center mb-4">Author Index</h2>
            <a href="{{ route('authors.create') }}" role="button" class="btn btn-success mb-4">Add New Author</a>

            <div class="table-responsive">
                <table id="authors-table" class="table table-bordered table-striped">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th class="text-center">Author ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Date of Birth</th>
                            <th class="text-center">Images</th>
                            <th class="text-center">Edit</th>
                            <th class="text-center">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($authors as $author)
                        <tr>
                            <td class="text-center">{{ $author->id }}</td>
                            <td>{{ $author->name }}</td>
                            <td class="text-center">{{ $author->date_of_birth }}</td>
                            <td class="text-center">
                                @foreach ($author->imgPaths as $imgPath)
                                <img src="{{ asset($imgPath) }}" alt="Author Image" class="rounded-circle" style="max-width: 60px; max-height: 60px; margin-right: 10px;">
                                @endforeach
                            </td>
                            <td class="text-center">
                                <a href="{{ route('authors.edit', $author->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                            </td>
                            <td class="text-center">
                                <a href="{{ route('authors.delete', $author->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this author?')"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#authors-table').DataTable({
                "paging": true,
                "ordering": true,
                "info": true
            });
        });
    </script>

   
