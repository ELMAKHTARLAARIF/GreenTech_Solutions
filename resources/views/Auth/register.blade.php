<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center text-gray-100">

    <form action="{{ route('register') }}" method="POST"
          class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-xl space-y-6">
        @csrf

        <h1 class="text-3xl font-bold text-center">Create Account</h1>

        {{-- Name --}}
        <div>
            <label class="block text-sm mb-1">Name</label>
            <input type="text" name="name" required
                   class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Email --}}
        <div>
            <label class="block text-sm mb-1">Email</label>
            <input type="email" name="email" required
                   class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm mb-1">Password</label>
            <input type="password" name="password" required
                   class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Confirm Password --}}
        <div>
            <label class="block text-sm mb-1">Confirm Password</label>
            <input type="password" name="password_confirmation" required
                   class="w-full bg-gray-800 border border-gray-700 rounded-lg px-4 py-2 focus:ring-2 focus:ring-indigo-500">
        </div>

        {{-- Errors --}}
        @if($errors->any())
            <div class="text-red-400 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 rounded-lg font-semibold">
            Sign Up
        </button>

        <p class="text-center text-sm text-gray-400">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-400 hover:underline">Login</a>
        </p>
    </form>

</body>
</html>
