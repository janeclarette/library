<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Admin Dashboard</title>
    <style>
        /* Global Styles */
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }
        .content {
            margin-left: 200px; /* Adjusted for the width of the sidebar */
            padding-top: 10vh; /* Adjusted for the height of the header */
        }



        .header-dashboard {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(to right, #9babb8, #967E76);
            color: white;
            height: 10vh;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        } 

        .logo-title {
            display: flex;
            align-items: center;
            margin-top: 20px;
            margin-left:-10px;
        }

        .logo {
            height: 40px;
            margin-bottom: 12px;
            margin-left: 20px;
        }

        .title {
            font-size: 1.5rem;
            margin-left: 1rem;
            user-select: none;
        }

        /* Profile Picture Styles */
        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 30px;
            user-select: none;
        }


        .navigation-sidebar {
            position: fixed;
            top: 10vh;
            left: 0;
            display: flex;
            flex-direction: column;
            padding: 1rem;
            background-color: #9BABB8;
            color: white;
            height: 100%;
            width: 200px;
            user-select: none;
        }
        

        .navigation-sidebar a {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 1rem;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: transform 0.3s, color 0.3s;
            font-size: 1.2rem;
            user-select: none;
        }

        .navigation-sidebar a:hover {
            transform: translateX(10px);
            color: #bc8181d5;
        }

        .navigation-sidebar a:hover .icon {
            margin-right: 30px;
        }

        .navigation-sidebar a p {
            margin: 0;
            font-size: 1rem;
            font-weight: 500;
            margin-left: 10px;
            user-select: none;
        }

        /* Profile Dropdown Styles */
        .profile-dropdown-content {
            display: none;
            position: absolute;
            background-color: #3c2507;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            right: 10px;
        }

        .profile-dropdown-content a {
            color: white;
            padding: 14px 18px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .profile-dropdown-content a:hover {
            background-color: #555;
        }

        .profile-dropdown:hover .profile-dropdown-content {
            display: block;
        }
    </style>
</head>

<body>
    <div class="header-dashboard">
        <!-- Logo and Title -->
        <div class="logo-title">
            <img src="../images/logo1.png" alt="BookHub Logo" class="logo">
            <h1 class="title">BookHub</h1>
        </div>

        <div class="profile-dropdown">
    <!-- Profile Picture -->
    <img src="../images/Rizza.jpg" alt="Profile" class="profile-pic">
    <div class="profile-dropdown-content">
    <a href=>Profile</a>
        <a href="{{ route('admin.logout') }}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>




    </div>

    <!-- Navigation Sidebar -->
    <div class="navigation-sidebar">
        
        <a href="{{ route('authors.index') }}" class="icon">
            <i class='bx bxs-dashboard'></i><p> Authors </p>
        </a>
        <a href="{{ route('books.index') }}" class="icon">
            <i class='bx bxs-book'></i> <p>Books</p>
        </a>
        <a href="{{ route('genres.index') }}" class="icon">
            <i class='bx bxs-objects-horizontal-left'></i> <p> Genres </p>
        </a>
        <a href="{{ route('suppliers.index') }}" class="icon">
            <i class='bx bxs-group'></i> <p> Suppliers </p>
        </a>
        <a href="{{ route('users.dashboard') }}" class="icon">
            <i class='bx bxs-user-account'></i><p> Users</p>
        </a>
        <a href="{{ route('admin.orders.index') }}" class="icon">
            <i class='bx bxs-cart'></i><p> Orders </p>
        </a>
        <a href="{{ url('/top-selling-books') }}" class="icon">
        <i class='bx bxs-chart'></i><p> Top Selling Books </p>
    </a>
    <a href="{{ url('/top-authors') }}" class="icon">
        <i class='bx bxs-chart'></i><p> Best Selling Authors </p>
    </a>
    <a href="{{ url('/monthly-sales-trend') }}" class="icon">
        <i class='bx bxs-chart'></i><p> Monthly Sales </p>
    </a>
    </div>

    <div class="content">
        @yield('content')
    </div>
    
    <script>
        // JavaScript for profile dropdown
        document.addEventListener("DOMContentLoaded", function() {
            const profileDropdown = document.querySelector('.profile-dropdown');
            const profileDropdownContent = document.querySelector('.profile-dropdown-content');

            profileDropdown.addEventListener('mouseover', function() {
                profileDropdownContent.style.display = 'block';
            });

            profileDropdown.addEventListener('mouseout', function() {
                profileDropdownContent.style.display = 'none';
            });
        });
    </script>


</body>


</html>
