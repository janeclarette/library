@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Genre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        margin-top: 30px;
        margin-left: 240px;
        margin-right: 100px;
        user-select: none;
    }
    </style>
<body>
    <div class="container">
        <h1>Edit Genre</h1>
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
