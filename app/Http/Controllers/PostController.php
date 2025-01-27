<?php

namespace App\Http\Controllers;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function showPost() {
        $posts = Post::all();
        return view('auth.dashboard',compact('posts'));
    }
    public function createPost() {
        return view('auth.dashboard');
    }

    public function storePost(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'user_id' => Auth::id()
        ]);

        return redirect('showpost')->with('success', 'Post Created!!!');
    }
        
    public function editPost(Request $request){
        $post = Post::find($request->id);

        if ($post->user_id != Auth::id()) {
            return redirect('showpost')->with('error', 'Unauthorized action.');
        }

        return view('auth.updatepost', compact('post'));
    }
    
    public function updatePost(Request $request, $id) {
        $post = Post::find($id);

        // Check if the user is the owner of the post
        if ($post->user_id !== Auth::id()) {
            return redirect('showpost')->with('error', 'Unauthorized action.');
        }
    
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);
    
        // Update the post with new title and body
        $post->update($request->only(['title', 'body']));
    
        // Redirect back with success message
        return redirect('showpost')->with('success', 'Post Updated!');
    }

    public function delPost(Request $request) {
        $post = Post::find($request->id);
  
        $post->delete();
        return redirect('showpost')->with('success', 'Post Deleted!!!');
    } 
}
