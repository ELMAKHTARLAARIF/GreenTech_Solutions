<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <title>Product Catalog</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>


<body class="bg-gray-950 text-gray-200 min-h-screen flex flex-col">

  <!-- Header -->
  <header class="bg-gray-900 border-b border-gray-800 px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-indigo-400">
      GreenTech Solutions
    </h1>

    <nav class="flex items-center gap-4">
      <a href="{{ route('products') }}" class="hover:text-indigo-300 transition">
        Home
      </a>
      <form action="{{route('Search')}}" method="GET">

        <input
          name="query"
          id="query"
          type="text"
          placeholder="Search products..."
          class="bg-gray-800 border border-gray-700 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
      </form>
      <form method="POST" action="#">
        @csrf
        <button type="submit"
          class="bg-red-600 hover:bg-red-700 transition text-white px-4 py-2 rounded-lg font-medium">
          Logout
        </button>
      </form>
    </nav>
  </header>
  @if(session('error'))
  <div class="bg-red-100 text-red-700 p-3 rounded">
    {{ session('error') }}
  </div>
  @endif

  <!-- Main Content -->
  <main class="flex-1 max-w-7xl mx-auto w-full p-6 flex gap-6">

    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 border border-gray-800 rounded-xl p-5">
      <h2 class="text-lg font-semibold text-white mb-4">
        Categories
      </h2>
      <form action="{{ route('Category') }}" method="GET">
        <ul class="space-y-2">
          <li>
            <button name="category" value="Plantes" type="submit" class="block px-3 py-2 rounded-lg hover:bg-gray-800 transition">
              Plantes
            </button>
          </li>
          <li>
            <button name="category" value="Graines" type="submit" class="block px-3 py-2 rounded-lg hover:bg-gray-800 transition">
              Graines
            </button>
          </li>
          <li>
            <button name="category" value="Outils" type="submit" class="block px-3 py-2 rounded-lg hover:bg-gray-800 transition">
              Outils
            </button>
          </li>
        </ul>
      </form>

    </aside>

    <!-- Product Grid -->
    <section class="flex-1 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($products as $product)
      <div class="bg-gray-900 border border-gray-800 rounded-xl p-5 flex flex-col hover:border-indigo-500 transition">

        <h3 class="text-lg font-semibold text-white mb-1">
          {{ $product->name }}
        </h3>

        <p class="text-indigo-400 font-bold mb-2">
          {{ $product->price }} €
        </p>

        <p class="text-gray-400 text-sm mb-4">
          {{ $product->category }}
        </p>

        <a
          href="{{ route('product-details', $product->id) }}"
          class="mt-auto text-center bg-indigo-600 hover:bg-indigo-700 transition text-white py-2 rounded-lg font-medium">
          View Details
        </a>
      </div>
      @endforeach
    </section>

  </main>

  <!-- Footer -->
  <footer class="bg-gray-900 border-t border-gray-800 text-gray-500 text-center py-4">
    &copy; 2026 GreenTech Solutions
  </footer>

</body>

</html>