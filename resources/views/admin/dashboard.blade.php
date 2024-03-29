
<h2>Admin Dashboard</h2>

<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('authors.index')" :active="request()->routeIs('authors.index')">
                        {{ __('Authors') }}
                    </x-nav-link> <br>
                    <x-nav-link :href="route('books.index')" :active="request()->routeIs('books.index')">
                        {{ __('Books') }}
                    </x-nav-link> <br>
                    <x-nav-link :href="route('genres.index')" :active="request()->routeIs('genres.index')">
                        {{ __('Genres') }}
                    </x-nav-link> <br>
                    <x-nav-link :href="route('suppliers.index')" :active="request()->routeIs('suppliers.index')">
                        {{ __('Suppliers') }}
                    </x-nav-link> <br>

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

<form action="{{ route('admin.logout') }}" method="POST">
    @csrf <!-- Add CSRF token for security -->
    <button type="submit">Logout</button>
</form>
