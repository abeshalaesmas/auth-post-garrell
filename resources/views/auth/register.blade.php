<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <form action="{{route('register')}}" class="bg-white p-6 rounded shadow-md w-full max-w-sm" action="/register" method="POST">
        @csrf
        @method('POST')
        <h1 class="text-2xl font-bold text-blue-600 text-center">Mazemuk</h1>
        <h2 class="text-2xl font-bold mb-4">Register Now!</h2>
        <div class="mb-4">
            <label class="block text-gray-700" for="name">Name</label>
            <input class="w-full px-3 py-2 border rounded" type="text" name="name" id="name" placeholder="Name" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700" for="email">Email</label>
            <input class="w-full px-3 py-2 border rounded" type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700" for="password">Password</label>
            <input class="w-full px-3 py-2 border rounded" type="password" name="password" id="password" placeholder="Password" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700" for="password_confirmation">Confirm Password</label>
            <input class="w-full px-3 py-2 border rounded" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required>
        </div>
        <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600" type="submit">Register</button>
        <a class="text-blue-600 text-align-center underline" href="{{route('showlogin')}}">I already have an account</a>
    </form>
</body>
</html>