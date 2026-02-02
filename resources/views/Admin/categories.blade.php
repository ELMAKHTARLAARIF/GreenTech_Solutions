<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Categories</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-950 min-h-screen text-gray-100">

    <div class="max-w-5xl mx-auto py-12 px-4">
        <h1 class="text-4xl font-bold mb-8 text-center">Categories</h1>

        @if($categories->isEmpty())
            <p class="text-center text-gray-400">
                No categories available.
            </p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach($categories as $category)
                    <a
                        href="{{route('Dashboard')}}"
                        class="bg-gray-900 hover:bg-gray-800 transition rounded-xl p-6 text-center shadow-lg"
                    >
                        <h2 class="text-xl font-semibold text-indigo-400">
                            {{ $category }}
                        </h2>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
