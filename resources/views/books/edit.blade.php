@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
</head>
<style>
    body {
        margin-left: 250px;
        margin-right: 200px;
        color: white;
        user-select: none;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .container-main {
        width: 83rem;
        background-color: #EEE9DA;
        padding: 40px;
        margin-left: -50px;
        margin-top: -22px;
        height: 690px;
    }

    .inner-container {
        background-color: #967E76;
        padding: 20px;
        border-radius: 5px;
        margin-left: 1px;
        height: 600px;
        margin-top: 23px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    h2 {
        color: white;
        margin-top: 2px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .table-responsive {
        overflow: auto;
    }

    .btn-primary {
        background-color: #b94f4fe2;
        border-color: #480000;
    }
    .btn-primary:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
        }

    .mb-3 {
        margin-bottom: 20px; 
    }

    .form-control {

        width: 73rem;
        height: 40px;  
    }

   
    textarea.form-control {
        width: 73rem; 
        height: 30px; 
    }
</style>
<body>
    <div class="container-main">
        <div class="inner-container"> 
    <div class="container">
        <h2>Edit Book</h2>
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
