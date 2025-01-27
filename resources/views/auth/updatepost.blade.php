<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 gap-4">
    <div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-lg gap-4">
        <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
        <form action="{{route('updatepost', ['id' => $post->id])}}" method="POST">
            @csrf
            @method('PUT')
            <p class="block text-gray-700 font-bold mb-2">ID:{{$post->id}}</p>
            <div class="mb-4">
                <label for="title" class="block text-gray-700 font-bold mb-2">Title:</label>
                <input type="text" id="title" name="title" value="{{ $post->title }}" required class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-4">
                <label for="body" class="block text-gray-700 font-bold mb-2">Body:</label>
                <textarea id="body" name="body" required class="w-full p-2 border border-gray-300 rounded-lg">{{ $post->body }}</textarea>
            </div>
            <div class="flex justify-between">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg">Update Post</button>
            </div>
        </form>
        <form action="{{route('delpost', ['id' => $post->id])}}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-600 text-white padding-top px-4 py-2 rounded-lg">Delete Post</button>
        </form>
    </div>
</body>
</html>