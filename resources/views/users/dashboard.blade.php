@include('../admin/dashboard')
@if ($users->isEmpty())
    <p>No users found.</p>
@else
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Author Index</title>
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
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->is_active ? 'Active' : 'Inactive' }}</td>
                <td>
                    @if ($user->is_active)
                    <form action="{{ route('admin.user.deactivate', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit">Deactivate</button>
                    </form>
                    @else
                    <form action="{{ route('admin.user.activate', $user->id) }}" method="POST">
                        @csrf
                        @method('POST') <!-- Correct method to POST -->
                        <button type="submit">Activate</button>
                    </form>

                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endif

