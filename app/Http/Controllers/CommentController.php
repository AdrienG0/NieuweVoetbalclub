<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\News;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, News $news)
    {
        $request->validate([
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'news_id' => $news->id,
            'user_id' => auth()->id(),
            'content' => $request->content,
        ]);

        return redirect()->route('news.show', $news)->with('success', 'Reactie toegevoegd!');
    }
}

