@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
  
    <style>
        body {
            color:white;
            margin-left: 230px;
            margin-top: 0px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .container-main {
            background-color: #EEE9DA; /* Light Brown color */
            padding: 40px; /* Padding for the container */
            border-radius: 10px; /* Rounded corners for the container */
            margin-left: -50px;
            height: 667px;
        }

        .inner-container {
            background-color: #978D8D; /* Light Gray color */
            padding: 20px; /* Padding for the inner container */
            border-radius: 5px; /* Rounded corners for the inner container */
            margin-left: 20px;
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
        }

        h2 {
            color: white;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .btn-success {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #b94f4fe2; 
            color: white; 
            border-color: #4B0000; 
            transition: 200ms;
        }

        .btn-success:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
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
    
</head>

<body>
    <div class="container-main"> <!-- Light brown container -->
        
        <div class="inner-container"> <!-- Light gray inner container -->
            <div class="container-fluid" style="height: 50vh;">
                <div class="col-md-12 mt-4"> 

                    <h2 class="text-left mb-4">Author Lists</h2>
                    <p class="p">Manage list of authors </p>
                    <a href="{{ route('authors.create') }}" role="button" class="btn btn-success mb-4">Add New Author</a>

                    <div class="table-responsive">
                        <table id="authors-table" class="table table-bordered table-striped">
                           
                            <thead class="bg-gradient-primary text-center text-white">
                                <tr>
                                    <th>Author ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Images</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                        <img src="{{ asset($imgPath) }}" alt="Author Image" style="max-width: 60px; max-height: 60px; margin-right: 10px;">
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

</body>

</html>
