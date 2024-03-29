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

        /* Header Dashboard Styles */
        .header-dashboard {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: linear-gradient(to right, #3a2307, #6d4009);
            color: white;
            height: 10vh;
            font-family: 'Montserrat', sans-serif;
        }

        .logo-title {
            display: flex;
            align-items: center;
        }

        .logo {
            height: 40px;
        }

        .title {
            font-size: 1.5rem;
            margin-left: 1rem;
        }

        .search-bar {
            flex-grow: 1;
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            margin: 0 1rem;
        }

        .search-input {
            width: 100%; /* Full width */
            max-width: 500px; /* Maximum width */
            padding: 0.5rem;
            border-radius: 10px;
            border: none;
            background-color: rgba(255, 255, 255, 0.2);
            transition: background-color 0.3s;
            box-sizing: border-box; /* Include padding in width */
        }

        .search-input:focus {
            background-color: rgba(255, 255, 255, 0.5);
        }

        .profile-dropdown {
            position: relative;
        }

        .profile-pic {
            width: 40px;
            height: 40px;
            border-radius:50%;
            cursor: pointer;
            margin-right: 30px;
        }

        .dropdown-content {
            position: absolute;
            top: 50px;
            right: 0;
            width: 200px;
            background-color: white;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: none;
        }

        .dropdown-item {
            display: block;
            width: 100%;
            padding: 0.5rem;
            text-align: left;
            color: #333;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .dropdown-item:hover {
            background-color: #f1f1f1;
        }

        /* Navigation Sidebar Styles */
        .navigation-sidebar {
            display: flex;
            flex-direction: column;
            padding: 1rem;
            background-color: #3c2507;
            color: white;
            height: 604px;
            width: 200px;
        }

        .navigation-sidebar a {
            display: flex;
            align-items: center;
            margin-bottom: 0.5rem;
            padding: 0.5rem;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: transform 0.3s, color 0.3s; /* Added transform and color transitions */
        }

        .navigation-sidebar a:hover {
            background-color: #888e9c;
            transform: translateX(10px); /* Move the link to the right on hover */
            color: #f8f8f8; /* Change the text color on hover */
        }

        .navigation-sidebar .icon {
            margin-right: 10px;
            transition: margin-right 0.3s; /* Added margin-right transition */
        }

        .navigation-sidebar a:hover .icon {
            margin-right: 20px; /* Adjusted margin-right on hover */
        }
    </style>
</head>

<body>

    <!-- Header Dashboard -->
    <div class="header-dashboard">
        <!-- Logo and Title -->
        <div class="logo-title">
            <img src="../images/logo1.png" alt="BookHub Logo" class="logo">
            <h1 class="title">BookHub</h1>
        </div>

        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search..." class="search-input">
        </div>

        <!-- Profile Picture and Dropdown -->
        <div class="profile-dropdown">
            <!-- Profile Picture -->
            <img src="../images/Rizza.jpg" alt="Profile" class="profile-pic" id="profileDropdownTrigger">

            <!-- Dropdown -->
            <div class="dropdown-content" id="profileDropdown">
                <a href="#" class="dropdown-item">Profile</a>
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf <!-- Add CSRF token for security -->
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Navigation Sidebar -->
    <div class="navigation-sidebar">
        <a href="{{ route('authors.index') }}" class="icon">
            <i class='bx bxs-dashboard'></i> Authors
        </a>
        <a href="{{ route('books.index') }}" class="icon">
            <i class='bx bxs-book'></i> Books
        </a>
        <a href="{{ route('genres.index') }}" class="icon">
            <i class='bx bxs-objects-horizontal-left'></i> Genres
        </a>
        <a href="{{ route('suppliers.index') }}" class="icon">
            <i class='bx bxs-group'></i> Suppliers
        </a>
        <a href="{{ route('users.dashboard') }}" class="icon">
            <i class='bx bxs-user-account'></i> Users
        </a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const profileDropdownTrigger = document.getElementById('profileDropdownTrigger');
            const profileDropdown = document.getElementById('profileDropdown');

            profileDropdownTrigger.addEventListener('click', function () {
                profileDropdown.classList.toggle('hidden');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function (event) {
                if (!profileDropdownTrigger.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });
        });
    </script>

</body>

</html>
