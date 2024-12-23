@extends('layouts.app')

@section('content')
<h1>Nieuw Nieuwsitem</h1>
<form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Titel:</label>
    <input type="text" name="title" id="title" required>
    <br>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea>
    <br>
    <label for="image">Afbeelding:</label>
    <input type="file" name="image" id="image">
    <br>
    <label for="publication_date">Publicatiedatum:</label>
    <input type="date" name="publication_date" id="publication_date" required>
    <br>
    <button type="submit">Opslaan</button>
</form>
@endsection
