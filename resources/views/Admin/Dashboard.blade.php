@include('header.header')

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
@include('header.footer')