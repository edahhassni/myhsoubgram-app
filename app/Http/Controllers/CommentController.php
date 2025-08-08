<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
public function store(Request $request, Post $post)
    {
        $data = $request->validate([
            'body' => 'required|string|min:1|max:540',
        ]);

        $data['user_id'] = Auth::id();

        $post->comments()->create($data);

        return back()->with('success', 'Comment added successfully');
    }
}
