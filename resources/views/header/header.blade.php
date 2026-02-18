<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-950 text-gray-200 min-h-screen flex flex-col">

    <!-- Header -->
    <header class="bg-gray-900 border-b border-gray-800 px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-400">
            Admin Dashboard
        </h1>

        <form method="POST" action="{{ route('Logout') }}">
            @csrf
            <button type="submit"
                class="bg-red-600 hover:bg-red-700 transition text-white px-4 py-2 rounded-lg font-medium">
                Logout
            </button>
        </form>

    </header>

    <div class="flex flex-1">

        <!-- Sidebar -->
        <aside class="w-64 bg-gray-900 border-r border-gray-800 p-6">
            <nav class="space-y-2">
                <a href="{{route('Dashboard')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Products
                </a>
                <a href="{{route('categories')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Categories
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Orders
                </a>
                <a href="{{route('index')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                     Users
                </a>
                <a href="{{route('index_role')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                     Roles &  Permissions
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">