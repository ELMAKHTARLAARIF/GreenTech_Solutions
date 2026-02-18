@include('header.header')
<!-- 
<div class="min-h-screen flex flex-col bg-gray-950"> -->

<!-- Page Content -->
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        @if(session('error'))
        <div class="bg-red-600 text-white px-4 py-2 rounded mb-6">
            {{ session('error') }}
        </div>
        @endif
        <div class="max-w-md mx-auto bg-gray-900 p-8 rounded-2xl shadow-lg mt-12">
            <h2 class="text-2xl font-bold text-white mb-6 text-center">Add User</h2>

            <form action="{{route('user_store')}}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Name</label>
                    <input type="text" name="name" required
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Email</label>
                    <input type="email" name="email" required
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Password</label>
                    <input type="password" name="password" required
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500">
                </div>

                <div>
                    <label class="block text-sm text-gray-300 mb-1">Role</label>
                    <select name="role_id" id="roleSelect"
                        class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 text-white focus:ring-2 focus:ring-indigo-500">
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">
                            {{ $role->name }}
                        </option>
                        @endforeach

                    </select>
                </div>
                <button type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 transition py-2 rounded-lg text-white font-semibold">
                    Create User
                </button>
            </form>
        </div>
    </div>

<!-- Footer -->
@include('header.footer')

<!-- </div> -->