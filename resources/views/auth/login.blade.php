<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <h1 class="text-2xl font-bold text-blue-600 text-center">Mazemuk</h1>
        <h2 class="text-2xl font-bold mb-6 ">Login</h2>
        <form action="{{route('login')}}" method="POST">
            @method('POST')
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 mb-2" for="email">Email</label>
                <input class="w-full p-2 border border-gray-300 rounded-lg" type="email" id="email" name="email" placeholder="Enter your email">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 mb-2" for="password">Password</label>
                <input class="w-full p-2 border border-gray-300 rounded-lg" type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg w-full">Login</button>
        </form>
        <a class="text-blue-600 text-align-center underline" href="{{route('showregister')}}">I don't have account</a>
    </div>
</body>
</html>