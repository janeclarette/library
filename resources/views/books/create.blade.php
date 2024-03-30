@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
        border-color: #b94f4fe2;
    }

    .mb-3 {
        margin-bottom: 20px; 
    }

    /* Adjust the width of the form control elements */
    .form-control {

        width: 73rem;
        height: 40px;  /* Adjust this value to your preference */
    }

    /* Adjust the width of the textarea */
    textarea.form-control {
        width: 73rem; /* Adjust this value to your preference */
        height: 30px; /* Adjust this value to your preference */
    }
</style>

<body>
    <div class="container-main">
        <div class="inner-container">
            <div class="container">
                <h2>Create Book</h2>
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
        </div>
    </div>
</body>

</html>
