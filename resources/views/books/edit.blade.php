<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
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
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $book->name }}">
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" class="form-control" value="{{ $book->price }}">
                </div>
                <div>
                    <label for="stock">Stock:</label>
                    <input type="text" id="stock" name="stock" class="form-control" value="{{ $book->stock }}"> <br>
                </div>
                <div>
                    <label for="img_path">Image:</label>
                    <input type="file" id="img_path"  name="img_path[]" multiple> <br><br>
                </div>
                <div>
                    <label for="author_id">Author:</label>
                    <select name="author_id" id="author_id">
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                        @endforeach
                    </select> <br> <br>
                </div>
                <div>
                    <label for="genre_id">Genre:</label>
                    <select name="genre_id" id="genre_id">
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}" {{ $book->genre_id == $genre->id ? 'selected' : '' }}>{{ $genre->name }}</option>
                        @endforeach
                    </select> <br><br>
                </div>
                <div>
                    <button type="submit">Update Book</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
