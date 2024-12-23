@extends('layouts.app')

@section('content')
<h1>Laatste Nieuwtjes</h1>
<a href="{{ route('news.create') }}">Nieuw item toevoegen</a>
<ul>
    @foreach($news as $item)
        <li>
            <h2>{{ $item->title }}</h2>
            <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" width="100">
            <p>{{ $item->content }}</p>
            <small>Gepubliceerd op: {{ $item->publication_date }}</small>
            <a href="{{ route('news.show', $item) }}">Details</a>
        </li>
    @endforeach
</ul>
@endsection
