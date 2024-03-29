@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        <h1>Edit Book</h1>
        <div>
            @if(session()->has('success'))
                <div>
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div>
            <form method="post" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $book->name }}" required>
                    <div class="invalid-feedback">Please provide a name for the book.</div>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description:</label>
                    <textarea id="description" name="description" class="form-control">{{ $book->description }}</textarea>
                    <div class="invalid-feedback">Please provide a description for the book.</div>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price:</label>
                    <input type="number" id="price" name="price" class="form-control" value="{{ $book->price }}" required>
                    <div class="invalid-feedback">Please provide a valid price for the book.</div>
                </div>
                <div class="mb-3">
                    <label for="img_path" class="form-label">Image:</label>
                    <input type="file" id="img_path"  name="img_path[]" multiple required>
                    <div class="invalid-feedback">Please provide valid image files for the book.</div>
                </div>
                <div class="mb-3">
                    <label for="author_id" class="form-label">Author:</label>
                    <select name="author_id" id="author_id" class="form-select" required>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="genre_id" class="form-label">Genre:</label>
                    <select name="genre_id" id="genre_id" class="form-select" required>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
