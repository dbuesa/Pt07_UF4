<x-app-layout>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar article
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form method="POST" action="{{ route('articles.update', $article) }}">
            @csrf
            @method('PUT')
            <label for="description">Descripció:</label>
            <textarea id="description" name="description" required>{{ $article->descripcio }}</textarea>

            <button type="submit">Actualitzar article</button>
        </form>
    </div>
</x-app-layout>
