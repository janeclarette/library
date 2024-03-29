@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
    body{
        margin-top: 45px;
        margin-left: 250px;
        margin-right: 200px;
        user-select: none;
    }
</style>
<body>
    <div class="container">
        <h1>Create Author</h1>
        <form method="post" action="{{ route('authors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" required>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Author Image(s)</label>
                <input type="file" class="form-control" id="img_path" name="img_path[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary">Create Author</button>
        </form>
    </div>
</body>
</html>
