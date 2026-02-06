<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>My Favorites</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="bg-gray-950 text-gray-100 min-h-screen">
    <!-- Header -->
    <header class="max-w-7xl mx-auto px-6 py-6">
        <h1 class="text-3xl font-bold text-white">
            My Favorite Products
        </h1>
        <p class="text-gray-400 mt-1">
            Your saved plants and tools
        </p>
    </header>

    <!-- Favorites Grid -->
    <main class="max-w-7xl mx-auto px-6 pb-10">
        <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 ">

            @foreach($favorites as $product)
            <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 flex flex-col hover:border-yellow-400  transition">

                <h3 class="text-lg font-semibold text-white mb-1">
                    {{ $product->name }}
                </h3>

                <p class="text-yellow-400 font-bold mb-2">
                    {{ $product->price }} €
                </p>

                <p class="text-gray-400 text-sm mb-4">
                    {{ $product->category }}
                </p>

                <div class="mt-auto flex items-center justify-between">
                    <form action="{{ route('delete-product-from-favorite', $product->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded">
                            Remove From Favorites
                        </button>
                    </form>
                    <i class="fa-solid fa-bookmark text-yellow-400 text-xl"></i>
                </div>
            <a href="{{ route('products') }}" class="text-gray-400 hover:text-yellow-300 mt-2 block"><-back to products</a>
            </div>
            @endforeach
        </section>

        <!-- Empty State (optional) -->
        {{--
        <div class="text-center text-gray-400 mt-20">
            <i class="fa-regular fa-bookmark text-4xl mb-4"></i>
            <p>No favorites yet</p>
        </div>
        --}}
    </main>

</body>

</html>