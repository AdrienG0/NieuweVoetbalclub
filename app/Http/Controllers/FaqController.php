<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq; // Vergeet niet het Faq-model te importeren
use App\Models\Category; // Vergeet niet het Category-model te importeren

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::with('category')->get();
        return view('faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Haal alle categorieën op om in een dropdown te tonen
        $categories = Category::all();
        return view('faqs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valideer de invoer
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Maak een nieuwe FAQ aan
        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ toegevoegd!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        // Haal alle categorieën op en de geselecteerde FAQ
        $categories = Category::all();
        return view('faqs.edit', compact('faq', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        // Valideer de invoer
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Update de FAQ
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ bijgewerkt!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        // Verwijder de FAQ
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ verwijderd!');
    }
}
