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

        <form method="POST" action="#">
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
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Products
                </a>
                <a href="{{route('categories')}}" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Categories
                </a>
                <a href="#" class="block px-4 py-2 rounded-lg hover:bg-gray-800 transition">
                    Orders
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">

            <!-- Page Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-semibold text-white">
                    Products
                </h2>

                <a
                    href="{{route('addProduct')}}"
                    class="bg-indigo-600 hover:bg-indigo-700 transition text-white px-5 py-2 rounded-lg font-medium">
                    + Add Product
                </a>
            </div>
            @if(session('success'))
            <div class="mb-4 p-4 bg-green-600 text-white rounded-lg
                    ">
                {{ session('success') }}
            </div>
            @endif
            @if(session('error'))
            <div class="mb-4 p-4 bg-red-600 text-white rounded-lg">
                {{ session('edit-error') }}
            </div>
            @endif
            
            <div class="bg-gray-900 border border-gray-800 rounded-xl shadow overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-800 text-gray-300">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Name</th>
                            <th class="px-4 py-3 text-left">Category</th>
                            <th class="px-4 py-3 text-left">Price</th>
                            <th class="px-4 py-3 text-left">Stock</th>
                            <th class="px-4 py-3 text-left">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-800">
                        @foreach($products as $product)
                        <tr class="hover:bg-gray-800 transition">
                            <td class="px-4 py-3">{{ $product->id }}</td>
                            <td class="px-4 py-3">{{ $product->name }}</td>
                            <td class="px-4 py-3">{{ $product->category }}</td>
                            <td class="px-4 py-3">${{ $product->price }}</td>
                            <td class="px-4 py-3">{{ $product->stock }}</td>
                            <td class="px-4 py-3 space-x-3">
                                <a href="{{ route('edit-product', $product->id) }}"
                                    class="text-indigo-400 hover:text-indigo-300 font-medium">
                                    Edit
                                </a>

                                <form action="{{ route('delete-product', $product->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                                        Delete
                                    </button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800 text-gray-500 text-center py-4">
        &copy; 2026 GreenTech Solutions
    </footer>

</body>

</html>