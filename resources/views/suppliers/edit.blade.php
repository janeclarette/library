@include('../admin/dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Supplier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    body{
        margin-left: 250px;
        margin-right: 200px;
        color: white;
        user-select: none;
         font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

        .container-main {
            width:83rem;
            background-color: #EEE9DA; /* Light Brown color */
            padding: 40px;
            margin-left: -50px;
            margin-top: -22px;
            height: 690px;
        }

        .inner-container {
            background-color: #967E76; /* Light Gray color */
            padding: 40px; /* Padding for the inner container */
            border-radius: 5px; /* Rounded corners for the inner container */
            margin-left: 1px;
            height: 600px;
            margin-top: 23px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        h2 {
            color: white;
            /* margin-t */
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }

        .table-responsive {
            overflow: auto;
        }

        .btn-primary{
            background-color: #b94f4fe2;
            border-color: #480000;
        }
        .btn-primary:hover {
            background-color: maroon; /* Green color on hover */
            border-color: #4B0000;
            transition: 200ms;
        }
</style>
<body>
    <div class="container-main">
        <div class="inner-container"> 
    <div class="container">
        <h1>Edit Supplier</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $supplier->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="transactiondate" class="form-label">Transaction Date</label>
                <input type="date" class="form-control" id="transactiondate" name="transactiondate" value="{{ old('transactiondate', $supplier->transactiondate) }}" required>
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $supplier->quantity) }}" required>
            </div>
            <div class="mb-3">
                <label for="img_path" class="form-label">Images</label>
                <input type="file" class="form-control" id="img_path" name="img_path[]" multiple required>
            </div>
            <div class="mb-3">
                <label for="book_id" class="form-label">Book</label>
                <select class="form-select" id="book_id" name="book_id" >
                    @foreach($books as $book)
                        <option value="{{ $book->id }}" {{ old('book_id', $supplier->book_id) == $book->id ? 'selected' : '' }}>{{ $book->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
    </div>
</body>
</html>
