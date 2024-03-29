@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Author</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        body{
            margin-top: 45px;
            margin-left: 250px;
            margin-right: 200px;
            user-select: none;
        }
    </style>
</head>
<body>
    <h1>Edit Author</h1>
    <div class="form-group">
        <form method="post" action="{{ route('authors.update', $author->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') 

            <div class="mb-3">
                <label for="name" class="form-label">Author Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter author name" value="{{ $author->name }}" required>
                <div class="invalid-feedback">Please provide a valid author name.</div>
            </div>

            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date Of Birth</label>
                <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ $author->date_of_birth }}" required>
                <div class="invalid-feedback">Please provide a valid date of birth.</div>
            </div>

            <div class="mb-3">
                <label for="img_path" class="form-label">Author Images</label>
                <input type="file" class="form-control" id="img_path" name="img_path[]" multiple accept="image/jpeg, image/png, image/jpg, image/gif">
                <div class="invalid-feedback">Please provide valid image files (jpeg, png, jpg, gif).</div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update Author</button>
            </div>
        </form>
    </div>
</body>
</html>
