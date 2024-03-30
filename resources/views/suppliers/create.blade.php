@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h1>Create Supplier</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required >
            </div>
            <div class="mb-3">
                <label for="transactiondate" class="form-label">Transaction Date</label>
                <input type="date" class="form-control" id="transactiondate" name="transactiondate" value="{{ old('transactiondate') }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Images</label>
                <input type="file" class="form-control" id="img_path" name="img_path[]" multiple required>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select class="form-select" id="book_id" name="book_id">
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Supplier</button>
        </form>
    </div>
</body>
</html>
