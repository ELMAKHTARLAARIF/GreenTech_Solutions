<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 min-h-screen text-gray-100">

    <div class="max-w-4xl mx-auto py-12 px-4">
        <a href="{{ url()->previous() }}"
           class="inline-block mb-6 text-indigo-400 hover:underline">
            ← Back
        </a>

        <div class="bg-gray-900 rounded-2xl shadow-xl p-8">

            <h1 class="text-4xl font-bold mb-4">
                {{ $product->name }}
            </h1>

            <p class="text-gray-400 mb-6">
                Category: <span class="text-indigo-400">{{ $product->category }}</span>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div>
                    <p class="text-sm text-gray-400">Price</p>
                    <p class="text-2xl font-semibold">${{ $product->price }}</p>
                </div>

                <div>
                    <p class="text-sm text-gray-400">Stock</p>
                    <p class="text-2xl font-semibold">{{ $product->stock }}</p>
                </div>
            </div>

            <div>
                <h2 class="text-lg font-semibold mb-2">Description</h2>
                <p class="text-gray-300 leading-relaxed">
                    {{ $product->description ?? 'No description available.' }}
                </p>
            </div>

        </div>

    </div>

</body>
</html>
