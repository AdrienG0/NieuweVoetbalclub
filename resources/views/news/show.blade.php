@extends('layouts.app')

@section('content')
<h1>{{ $news->title }}</h1>
<img src="{{ asset('storage/' . $news->image_path) }}" alt="{{ $news->title }}" width="200">
<p>{{ $news->content }}</p>
<small>Gepubliceerd op: {{ $news->publication_date }}</small>
<br>
<a href="{{ route('news.edit', $news) }}">Bewerken</a>
<form action="{{ route('news.destroy', $news) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Weet je zeker dat je dit item wilt verwijderen?')">Verwijderen</button>
</form>
<br>
<a href="{{ route('news.index') }}">Terug naar overzicht</a>
@endsection
