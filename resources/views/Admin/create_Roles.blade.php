<!-- Add Role Form -->
@include('header.header')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="max-w-md mx-auto bg-gray-900 p-8 rounded-2xl shadow-lg mt-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Add Role</h2>

            <form action="{{ route('roles_store') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Role Name</label>
                    <input type="text" name="name" required
                        placeholder="admin, client, editor..."
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500">
                </div>

                <h3 class="text-2xl font-bold text-white mb-6 text-center">Permissions</h3>
                @csrf
                @foreach($permissions as $permission)
                <div>
                    <input type="checkbox"
                        name="permissions[]"
                        value="{{ $permission->id }}">
                    {{ $permission->name }} - {{ $permission->action }}
                </div>
                @endforeach

                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 transition py-2 rounded-lg text-white font-semibold">Save</button>
            </form>

        </div>
    </div>

@include('header.footer')