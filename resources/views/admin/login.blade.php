<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

    <div class="w-full max-w-md bg-white rounded-lg shadow-md p-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Admin Login</h1>

        @if ($errors->any())
            <div class="mb-4 p-3 text-red-700 bg-red-100 border border-red-300 rounded">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="mb-4 p-3 text-green-700 bg-green-100 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-gray-700 font-medium">Email</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required
                >
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Login
                </button>
            </div>
        </form>
    </div>

</body>
</html>
