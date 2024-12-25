<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category; // Zorg ervoor dat het Category-model geïmporteerd is
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
        $categories = Category::all(); // Haal alle categorieën op
        return view('news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'publication_date' => 'required|date',
            'categories' => 'nullable|array', // Zorg ervoor dat categories een array is
            'categories.*' => 'exists:categories,id', // Valideer dat elke categorie bestaat
        ]);

        $news = new News($validated);
        if ($request->hasFile('image')) {
            $news->image_path = $request->file('image')->store('news_images', 'public');
        }
        $news->save();

        // Koppel categorieën aan het nieuwsartikel
        if ($request->has('categories')) {
            $news->categories()->sync($request->categories);
        }

        return redirect()->route('news.index')->with('success', 'Nieuwsitem toegevoegd!');
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    public function edit(News $news)
    {
        $categories = Category::all(); // Haal alle categorieën op
        $selectedCategories = $news->categories->pluck('id')->toArray(); // Haal gekoppelde categorieën op
        return view('news.edit', compact('news', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image',
            'publication_date' => 'required|date',
            'categories' => 'nullable|array', // Zorg ervoor dat categories een array is
            'categories.*' => 'exists:categories,id', // Valideer dat elke categorie bestaat
        ]);

        $news->fill($validated);
        if ($request->hasFile('image')) {
            $news->image_path = $request->file('image')->store('news_images', 'public');
        }
        $news->save();

        // Update categorieën voor het nieuwsartikel
        if ($request->has('categories')) {
            $news->categories()->sync($request->categories);
        }

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
