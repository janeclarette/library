
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>BookHub</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        /* ... (your existing styles) ... */
    </style>
</head>
<body class="antialiased" style="overflow: hidden; margin: 0;"> <!-- Add margin: 0; to remove default margins -->

<div style="position: relative; display: flex; justify-content: center; align-items: center; min-height: 100vh; overflow: hidden;"> <!-- Center align vertically -->
    <!-- Video Background -->
    <video autoplay muted loop id="video-background" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;"> <!-- Use object-fit to cover entire container -->
        <source src="../images/BG1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>

    <div class="relative flex flex-row justify-center items-center" style="z-index: 2; width: 100%; padding: 0 20px;"> <!-- Added padding to compensate for scrollbar -->
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
                @else
                    <!-- Admin Login Button -->
                    <a href="{{ route('admin.register') }}" class="btn btn-admin mb-4 mr-4">
                        <i class='bx bxs-user' style='margin-top: 131px; font-size: 5.5em;'></i> <!-- Increased icon size -->
                        <span style="font-size: 1.5em;">Admin Login</span>
                    </a>

                    <!-- User Login Button -->
                    <a href="{{ route('register') }}" class="btn btn-user mb-4">
                        <i class='bx bx-user' style='margin-top: 131px; font-size: 5.5em;'></i> <!-- Increased icon size -->
                        <span style= "font-size: 1.5em;">User Login </span>
                    </a>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif --}}
                @endauth
            </div>
        @endif
    </div>
</div>

<!-- Button Styles -->
<style>
    .btn {
        display: inline-block;
        padding: 15px 40px; /* increased padding to make it bigger */
        font-size: 18px; /* increased font size */
        border-radius: 10px; /* made it more rectangular */
        text-decoration: none;
        color: white;
        transition: background-color 0.3s ease;
        width: 200px; /* fixed width for better vertical alignment */
        text-align: center; /* center-align text */
        height: 400px;
        margin-left: 300px;
    }

    .btn-admin {
        background-color: #A45B5B; /* Brown */
    }

    .btn-user {
        background-color: #8B4513; /* Saddle Brown */
    }

    .btn:hover {
        opacity: 0.9;
    }

    .btn i {
        margin-right: 0; /* removed margin for better vertical alignment */
        display: block; /* display icon as block for better vertical alignment */
        margin-bottom: 10px; /* added margin below icon */
    }
</style>

</body>
</html>