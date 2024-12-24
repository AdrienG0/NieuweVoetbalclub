@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-3xl font-bold mb-6">Veelgestelde vragen</h1>
    @foreach($categories as $category)
        <div class="mb-4">
            <h2 class="text-2xl font-semibold">{{ $category->name }}</h2>
            <ul class="list-disc ml-6">
                @foreach($category->faqs as $faq)
                    <li class="mt-2">
                        <strong>{{ $faq->question }}</strong>
                        <p class="text-gray-700">{{ $faq->answer }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
</div>
@endsection
