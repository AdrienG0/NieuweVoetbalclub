<form action="{{ route('faqs.store') }}" method="POST">
    @csrf
    <div class="mb-4">
        <label for="question" class="block text-sm font-medium text-gray-700">Vraag</label>
        <input type="text" name="question" id="question" class="mt-1 block w-full" required>
    </div>

    <div class="mb-4">
        <label for="answer" class="block text-sm font-medium text-gray-700">Antwoord</label>
        <textarea name="answer" id="answer" class="mt-1 block w-full" rows="4" required></textarea>
    </div>

    <div class="mb-4">
        <label for="category_id" class="block text-sm font-medium text-gray-700">Categorie</label>
        <select name="category_id" id="category_id" class="mt-1 block w-full" required>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
        Opslaan
    </button>
</form>
