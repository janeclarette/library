
<h2>Admin Dashboard</h2>

@if ($users->isEmpty())
    <p>No users found.</p>
@else
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
