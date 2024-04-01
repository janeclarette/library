@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
<style>
    body{
        margin-left: 250px;
        margin-right: 200px;
        color: white;
        user-select: none;
         font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

        .container-main {
            width:83rem;
            background-color: #EEE9DA; /* Light Brown color */
            padding: 40px;
            margin-left: -50px;
            margin-top: -22px;
            height: 690px;
        }

        .inner-container {
            background-color: #967E76; /* Light Gray color */
            padding: 40px; /* Padding for the inner container */
            border-radius: 5px; /* Rounded corners for the inner container */
            margin-left: 1px;
            height: 600px;
            margin-top: 23px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            overflow-y: auto;
        }


        h2 {
            color: white;
            /* margin-t */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .table-responsive {
            overflow: auto;
        }

        .btn-primary{
            background-color: #b94f4fe2;
            border-color: #480000;
        }
        .btn-primary:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
        }
</style>

</head>

<body>
    <div class="container-main">
        <div class="inner-container"> 
    <div class="container">
        <h2>Edit Genre</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('genres.update', $genre->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $genre->name }}" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ $genre->description }}</textarea>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Images</label><br>
                @foreach(explode(',', $genre->img_path) as $image)
                    <img src="{{ asset($image) }}" alt="Genre Image" style="max-width: 200px;" ><br>
                @endforeach
                <input type="file" class="form-control" id="img_path" name="img_path[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Update Genre</button>
        </form>
    </div>
</body>
</html>
