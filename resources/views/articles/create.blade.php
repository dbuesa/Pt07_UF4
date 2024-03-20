<x-app-layout>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Afegir nou article
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <label for="description">Descripció:</label>
            <textarea id="description" name="description" required placeholder="Backend és una..."></textarea>

            <button type="submit">Afegir article</button>
        </form>
    </div>
</x-app-layout>
