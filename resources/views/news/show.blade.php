@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded">

    <!-- Terug naar Laatste Nieuwtjes knop -->
    <div class="mb-4">
        <a href="{{ route('news.index') }}" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Terug naar Laatste Nieuwtjes
        </a>
    </div>


    <h1 class="text-3xl font-bold">{{ $news->title }}</h1>
    @if($news->image_path)
        <img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" class="w-full h-auto mt-4 rounded">
    @endif
    <p class="mt-4 text-gray-700">{{ $news->content }}</p>
    <small class="block mt-4 text-sm text-gray-500">Gepubliceerd op: {{ $news->publication_date }}</small>
    
    <!-- Alleen admins kunnen deze knoppen zien -->
    @if(auth()->check() && auth()->user()->role === 'admin')
        <div class="mt-6 space-x-4">
        <a href="{{ route('news.edit', $news) }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Bewerken
        </a>
            <form action="{{ route('news.destroy', $news) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                    onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">
                    Verwijderen
                </button>
            </form>
        </div>
    @endif
</div>
@endsection
