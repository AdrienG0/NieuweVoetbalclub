@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">FAQ Bewerken</h1>

    <!-- Formulier om de FAQ bij te werken -->
    <form action="{{ route('faqs.update', $faq) }}" method="POST">
        @csrf
        @method('PATCH') <!-- PATCH-methode om data bij te werken -->

        <div class="mb-4">
            <label for="question" class="block text-sm font-medium text-gray-700">Vraag</label>
            <input type="text" name="question" id="question" value="{{ old('question', $faq->question) }}" class="mt-1 block w-full" required>
        </div>

        <div class="mb-4">
            <label for="answer" class="block text-sm font-medium text-gray-700">Antwoord</label>
            <textarea name="answer" id="answer" rows="4" class="mt-1 block w-full" required>{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <div class="mb-4">
            <label for="category_id" class="block text-sm font-medium text-gray-700">Categorie</label>
            <select name="category_id" id="category_id" class="mt-1 block w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $faq->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Bijwerken</button>
    </form>

    <!-- Terug naar de FAQ lijst -->
    <div class="mt-4">
        <a href="{{ route('faqs.index') }}" class="text-blue-500 hover:underline">
            Terug naar FAQ's
        </a>
    </div>
</div>
@endsection
