<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="bg-blue-600 text-white p-4 text-center flex justify-between items-center">
       
        <h1 class="text-2xl font-bold blue-600">Mazemuk</h1>
        
        <form action="{{route('logout')}}" method="POST">
            @csrf
            @method('POST')
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Logout</button>
        </form>
    </div>
    <div class="max-w-2xl mx-auto mt-6 bg-white p-6 rounded-lg shadow-lg">
        <form action="{{route('storepost')}}" method="POST">
            @csrf
            <div class="mb-4">
                <input type="text" name="title" class="w-full p-2 border border-gray-300 rounded-lg mb-2" placeholder="Title">
                <textarea class="w-full p-2 border border-gray-300 rounded-lg mb-2" placeholder="What's on your mind?" name="body"></textarea>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2 w-full">Post</button>
            </div>
        </form>
        
        @if(Auth::check()) 
            @if(isset($posts) && $posts->count() > 0)
                @foreach($posts as $post)
                    @if($post->user_id == Auth::id())
                        <div class="bg-gray-100 p-4 rounded-lg mb-4">
                            <p class="text-l text-gray-1000">ID:{{$post->id}}</p>
                            <p class="font-bold">{{ $post->user->name }}:</p>
                            <p class="text-lg">{{ $post->title }}</p>
                            <span class="block bg-gray-200 p-4 rounded-lg mb-4">
                                <p>{{ $post->body }}</p>
                            </span>
                            <p class="text-sm text-gray-500">Published on: {{ $post->created_at->format('M d, Y H:i') }}</p>
                            <p class="text-sm text-gray-500">User ID: {{ $post->user->id}}</p>
                            <div class="flex justify-end mt-2">
                                <form action="{{route('editpost', ['id' => $post->id])}}" method="GET" class="mr-2">
                                    @csrf
                                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded-lg">Edit</button>
                                </form>
                                <form action="{{route('delpost', ['id' => $post->id])}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        @else
            <p class="text-center text-gray-500">Please log in to view the posts.</p>
        @endif
    </div>
</body>
</html>