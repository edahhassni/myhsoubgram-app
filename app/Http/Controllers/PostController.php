<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'description' => ['required'],
            'image' => ['required', 'mimes:jpeg,jpg,png,gif']
        ]);

        $imagePath= request('image')->store('posts','public');
        $data['image'] = $imagePath;
        $data['slug'] = Str::random(10);
        $data['user_id'] = Auth::user()->id;
        $data['description'] = request('description');
        Post::create($data);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // $comments = Comment::all();
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'description' => ['required'],
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif']
        ]);

        // إذا تم رفع صورة جديدة
        if ($request->hasFile('image')) 
        {
            $imagePath = $request->file('image')->store('posts', 'public');
            $data['image'] = $imagePath;
        } 
        
        $post->update($data);

        return back()->with('success', 'Post updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}