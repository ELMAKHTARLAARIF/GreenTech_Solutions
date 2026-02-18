@include('header.header')
    <div class="max-w-5xl mx-auto px-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-white">All Roles</h2>

            <!-- Add Role Button -->
            <a href="{{route('role_form')}}"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg">
                + Add Role
            </a>
        </div>

        <div class="bg-gray-800 rounded-2xl shadow-lg overflow-hidden">
            <table class="w-full text-left text-gray-300">
                <thead class="bg-gray-700 text-gray-200">
                    <tr>
                        <th class="px-6 py-3">#</th>
                        <th class="px-6 py-3">Role Name</th>
                        <th class="px-6 py-3 text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($roles as $role)
                    <tr class="border-b border-gray-700">
                        <td class="px-6 py-4">{{ $loop->iteration }}</td>
                        <td class="px-6 py-4">{{ $role->name }}</td>

                        <td class="px-6 py-4 text-center space-x-2">    
                            <!-- Edit Button -->
                            <a href=""
                                class="bg-indigo-600 hover:bg-indigo-700 text-white px-3 py-1 rounded-lg text-sm">
                                Edit
                            </a>

                            <!-- Delete Button -->
                            <form action="{{ route('delete_role', $role->id) }}"
                                method="POST"
                                class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-lg text-sm">
                                    Delete
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="text-center py-6 text-gray-400">
                            No roles found.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

@include('header.footer')