@include('header.header')
<div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-white">Users</h2>

        <a href="{{route('show')}}"
            class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg">
            Create User
        </a>
    </div>

    <div class="overflow-x-auto bg-gray-800 rounded-xl shadow-lg">
        <table class="min-w-full text-left text-white">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Email</th>
                    <th class="px-6 py-3">Role</th>
                    <!-- <th class="px-6 py-3">Permissions</th> -->
                    <th class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr class="border-b border-gray-700">
                    <td class="px-6 py-4">{{ $user->name }}</td>
                    <td class="px-6 py-4">{{ $user->email }}</td>
                    <td>{{ $user->role ? $user->role->name : '-' }}</td>

                    <td class="px-6 py-4 space-x-2">

                        <!-- Edit User -->
                        <a href=""
                            class="bg-green-600 hover:bg-green-700 px-2 py-1 rounded text-white text-xs">
                            Edit
                        </a>

                        <!-- Delete User -->
                        <form action="{{route('user_delete',$user->id)}}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="bg-red-600 hover:bg-red-700 px-2 py-1 rounded text-white text-xs">
                                Delete
                            </button>
                        </form>

                        <!-- Assign Permissions -->
                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <a href="{{route('export')}}"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg ">
        Export Excel
    </a>
</div>
@include('header.footer')