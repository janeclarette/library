<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
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
