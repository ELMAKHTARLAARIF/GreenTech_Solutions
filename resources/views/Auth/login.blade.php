<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 min-h-screen flex items-center justify-center text-gray-100">

    <form action="{{ route('login') }}" method="POST"
          class="w-full max-w-md bg-gray-900 p-8 rounded-2xl shadow-xl space-y-6">
        @csrf

        <h1 class="text-3xl font-bold text-center">Login</h1>

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

        {{-- Errors --}}
        @if($errors->any())
            <div class="text-red-400 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 py-2 rounded-lg font-semibold">
            Login
        </button>

        <p class="text-center text-sm text-gray-400">
            Don’t have an account?
            <a href="{{ route('register') }}" class="text-indigo-400 hover:underline">Sign up</a>
        </p>
    </form>

</body>
</html>
