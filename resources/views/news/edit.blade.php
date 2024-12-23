@extends('layouts.app')

@section('content')
<h1>Nieuwsitem Bewerken</h1>
<form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="title">Titel:</label>
    <input type="text" name="title" id="title" value="{{ $news->title }}" required>
    <br>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required>{{ $news->content }}</textarea>
    <br>
    <label for="image">Afbeelding (optioneel):</label>
    <input type="file" name="image" id="image">
    <br>
    <label for="publication_date">Publicatiedatum:</label>
    <input type="date" name="publication_date" id="publication_date" value="{{ $news->publication_date }}" required>
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection
