@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profiel van {{ $user->username ?? $user->name }}</h1>
    <p><strong>Email:</strong> {{ $user->email }}</p>
    <p><strong>Geboortedatum:</strong> {{ $user->birthdate ?? 'Niet opgegeven' }}</p>
    <p><strong>Over mij:</strong> {{ $user->about_me ?? 'Geen informatie' }}</p>
    @if ($user->profile_picture)
        <img src="{{ asset('storage/' . $user->profile_picture) }}" alt="Profielfoto" style="max-width: 200px;">
    @endif
</div>
@endsection

