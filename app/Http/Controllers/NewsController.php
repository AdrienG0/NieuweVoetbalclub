<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('news.index', compact('news'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'publication_date' => 'required|date',
        ]);

        $news = new News($validated);
        if ($request->hasFile('image')) {
            $news->image_path = $request->file('image')->store('news_images', 'public');
        }
        $news->save();

        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'publication_date' => 'required|date',
        ]);

        $news->fill($validated);
        if ($request->hasFile('image')) {
            $news->image_path = $request->file('image')->store('news_images', 'public');
        }
        $news->save();

        return redirect()->route('news.index')->with('success', 'Nieuwsitem bijgewerkt!');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('news.index')->with('success', 'Nieuwsitem verwijderd!');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}

