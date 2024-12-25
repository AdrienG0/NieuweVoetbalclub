<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create()
    {
        return view('questions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        Question::create([
            'question' => $request->question,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('questions.create')->with('success', 'Vraag ingediend!');
    }

    public function index()
    {
        $questions = Question::where('approved', false)->get();
        return view('admin.questions.index', compact('questions'));
    }

    public function approve(Question $question)
    {
        $question->update(['approved' => true]);
        return redirect()->route('admin.questions.index')->with('success', 'Vraag goedgekeurd!');
    }

    public function destroy($id)
    {
        // Zoek de vraag op basis van het ID
        $question = Question::findOrFail($id);

        // Verwijder de vraag
        $question->delete();

        // Redirect terug naar de lijst met vragen met een succesbericht
        return redirect()->route('admin.questions.index')->with('success', 'De vraag is succesvol verwijderd.');
    }
}
