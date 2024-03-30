@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
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
<body>
    <div class="container-main">
        <div class="inner-container"> 
    <div class="container">
        <h2>Create Genre</h2>
        <form method="post" action="{{ route('genres.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name">Name:</label>
                <input type="text" id="name" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description">Description:</label>
                <textarea id="description" class="form-control" name="description" required></textarea>
            </div>
            <div class="mb-3">
                <label for="img_path">Images:</label>
                <input type="file" id="img_path" class="form-control" name="img_path[]" multiple required>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create Genre</button>
            </div>
        </form>
    </div>
</body>
</html>
