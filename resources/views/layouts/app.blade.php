<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script>
</head>
<body class="bg-gray-100">
    <div class="flex flex-col h-screen">
        <!-- Header -->
        <header class="bg-[#6a4c93] text-white p-4">
            <div class="flex justify-between">
                <h1 class="text-xl font-semibold">Trade Finance Guarantee System</h1>
                <div class="flex items-center space-x-4">
                    <!-- Profile Dropdown -->
                    <div class="relative">
                        <button class="bg-gray-700 p-2 rounded-full">
                            <span class="text-white">Admin</span>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto">
            @yield('content')
        </main>

        <!-- Footer -->
        <footer class="bg-[#6a4c93] text-white p-4 text-center">
            &copy; 2024 Trade Finance Guarantee System. All rights reserved.
        </footer>
    </div>
</body>
</html>
