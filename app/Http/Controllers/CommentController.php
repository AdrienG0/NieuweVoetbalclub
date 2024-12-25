<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Comment; // Zorg ervoor dat het model geïmporteerd is

class CommentController extends Controller
{
    public function store(Request $request, News $news)
{
    // Log de gegevens om te controleren wat wordt verzonden
    \Log::info($request->all());

    // Validatie van de ingevoerde gegevens
    $validatedData = $request->validate([
        'content' => 'required|string|max:255',
    ]);

    // Maak een nieuwe reactie aan
    Comment::create([
        'content' => $validatedData['content'],
        'news_id' => $news->id, // Koppel de reactie aan het juiste nieuwsartikel
        'user_id' => auth()->id(), // Zorg ervoor dat de gebruiker is ingelogd
    ]);

    // Redirect terug naar de nieuwsdetailpagina met een succesbericht
    return redirect()->route('news.show', $news)->with('success', 'Reactie geplaatst!');
}

}