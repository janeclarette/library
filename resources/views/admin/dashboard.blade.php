
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
                    <x-nav-link :href="route('users.dashboard')" :active="request()->routeIs('users.dashboard')">
                        {{ __('Users') }}
                    </x-nav-link> <br>


                    <form action="{{ route('admin.logout') }}" method="POST">
    @csrf <!-- Add CSRF token for security -->
    <button type="submit">Logout</button>
</form>
