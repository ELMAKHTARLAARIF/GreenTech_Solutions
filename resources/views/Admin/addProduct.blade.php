<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Create Product</title>

  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Optional: Dark theme config -->
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            darkbg: '#0f172a'
          }
        }
      }
    }
  </script>
</head>

<body class="bg-gray-950 min-h-screen flex items-center justify-center text-gray-100">

  <main class="w-full px-4">
    <form
      action="{{route('store')}}"
      method="POST"
      class="max-w-xl mx-auto bg-gray-900 p-8 rounded-2xl shadow-xl space-y-6">
      @csrf

      <h1 class="text-3xl font-bold text-center text-white">
        Create Product
      </h1>

      <!-- Client ID -->

      <!-- Name -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">
          Product Name
        </label>
        <input
          type="text"
          name="name"
          required
          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Product name" />
      </div>

      <!-- Price -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">
          Price
        </label>
        <input
          type="number"
          step="0.01"
          name="price"
          required
          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="0.00" />
      </div>

      <!-- Stock -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">
          Stock
        </label>
        <input
          type="number"
          name="stock"
          required
          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Quantity" />
      </div>

      <!-- Category -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">
          Category
        </label>
        <select name="category" type="text" id="" class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500">
          <option value="Plantes">Plantes</option>
          <option value="Graines">Graines</option>
          <option value="Outils">Outils</option>
        </select>

      </div>
        <!-- <input
          type="text"
          name="category"
          required
          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Category name" /> -->
      <!-- Description -->
      <div>
        <label class="block text-sm font-medium text-gray-300 mb-1">
          Description
        </label>
        <textarea
          name="description"
          rows="4"
          class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500"
          placeholder="Product description"></textarea>
      </div>

      <!-- Actions -->
      <div class="flex gap-4">
        <button
          type="submit"
          class="w-full bg-indigo-600 hover:bg-indigo-700 transition text-white font-semibold py-2 rounded-lg">
          Save
        </button>

        <button
          type="reset"
          class="w-full bg-gray-700 hover:bg-gray-600 transition text-white font-semibold py-2 rounded-lg">
          Reset
        </button>
      </div>

    </form>
  </main>

</body>

</html>