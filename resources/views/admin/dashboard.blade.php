<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-gray-900 p-4 text-white flex justify-between items-center">
        <h1 class="text-xl font-bold">Admin Dashboard</h1>
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded">
                Logout
            </button>
        </form>
    </nav>

    <!-- Content -->
    <div class="container mx-auto mt-8 px-6">
        <h2 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name }}</h2>

        <!-- Cards Section -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- Users Card -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-lg font-semibold mb-2">Total Users</h3>
                <p class="text-3xl font-bold text-blue-600">{{ $totalUsers }}</p>
                <a href="{{ route('admin.users') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    View Users
                </a>
            </div>

            <!-- Posts Card -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-lg font-semibold mb-2">Total Posts</h3>
                <p class="text-3xl font-bold text-green-600">{{ $totalPosts }}</p>
                <a href="{{ route('admin.posts') }}" class="mt-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    View Posts
                </a>
            </div>

            <!-- Pending Posts Card -->
            <div class="bg-white rounded-lg shadow-md p-6 text-center">
                <h3 class="text-lg font-semibold mb-2">Pending Posts</h3>
                <p class="text-3xl font-bold text-yellow-600">{{ $pending }}</p>
                <a href="{{ route('admin.posts') }}" class="mt-4 inline-block bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">
                    Review Posts
                </a>
            </div>

        </div>
    </div>

</body>
</html>
