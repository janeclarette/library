<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Create Book</h1>
    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>
    <form method="post" action="{{ route('books.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name">Name:</label>
            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" required>
        </div>
        <div class="mb-3">
            <label for="description">Description:</label>
            <textarea id="description" class="form-control" name="description">{{ old('description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="price">Price:</label>
            <input type="number" id="price" class="form-control" name="price" value="{{ old('price') }}" required>
        </div>
        <div class="mb-3">
            <label for="img_path" class="form-label">Images:</label>
            <input type="file" class="form-control" id="img_path" name="img_path[]" multiple required>
        </div>
        <div class="mb-3">
            <label for="author_id">Author:</label>
            <select name="author_id" class="form-control" id="author_id">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="genre_id">Genre:</label>
            <select name="genre_id" class="form-control" id="genre_id">
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create Book</button>
        </div>
    </form>
</div>
</body>
</html>
