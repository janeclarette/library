@include('../admin/dashboard')
@if ($users->isEmpty())
    <p>No users found.</p>
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Link to the styles.css file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.5/datatables.min.js"></script>
        
    <style>
        body
        {
            margin: 30px 0 0 230px;
            user-select: none;
        }
    </style>
</head>

<style>
    body {
        color: white;
        margin-left: 25rem;
        margin-top: 0px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .container-main {
        background-color: #EEE9DA;
        padding: 40px;
        margin-left: -230px;
        height: 667px;
    }

    .inner-container {
        background-color: #978D8D;
        padding: 20px;
        border-radius: 5px;
        margin-left: 27px;
        height: 600px;
        overflow-y: auto;
    }

    .table-full-width {
        width: 100%;
        font-size: 16px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    table.dataTable thead th {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    table.dataTable tbody td {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: rgb(0, 0, 0); 
    }

    table.dataTable thead .sorting {
        color: rgb(0, 0, 0); 
    }

    .container h2.text-left {
        margin-top: 25px !important;
        margin-bottom: 0px !important;
        color: white;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }

    .container .p {
        color: rgb(250, 250, 250);
        margin-top: -10px !important;
        margin-bottom: 0 !important;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .btn-primary {
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        background-color: #b94f4fe2;
        color: white;
        border-color: #50320de2;
        margin-top: 0px;
        margin-bottom: 20px;
    }

    .table-responsive {
        overflow: auto;
    }

    /* Adjust the search bar */
    div.dataTables_wrapper div.dataTables_filter input {
        color: rgb(0, 0, 0) !important; 
        background-color: #ffffff !important; 
    }
</style>

<body>
    <div class="container-main">
        <div class="inner-container">
            <div class="container">
                <h2 class="text-left mb-4">User Lists</h2>
                <p>Organize collection of users </p>
                
                <table id="users-table" class="table table-bordered table-striped">
                    <thead class=" bg-gradient-primary text-center">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                            <td>
                                @if ($user->is_active)
                                <form action="{{ route('admin.user.deactivate', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger">Deactivate</button>
                                </form>
                                @else
                                <form action="{{ route('admin.user.activate', $user->id) }}" method="POST"> <!-- Changed PUT to POST -->
                                    @csrf
                                    @method('POST') <!-- Change method to POST -->
                                    <button type="submit" class="btn btn-success">Activate</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                "paging": true,             // Enable pagination
                "lengthMenu": [10, 25, 50, 100],  // Define the entries per page options
                "pageLength": 10,           // Initial number of entries per page
                "ordering": true,
                "info": true,
                "columnDefs": [{ "orderable": false, "targets": [3] }]  // Disable ordering for the Action column
            });
        });
    </script>

</body>

</html>
@endif
