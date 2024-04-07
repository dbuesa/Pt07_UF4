<!-- Utilització del component x-app-layout com a base per a la disposició de la pàgina -->
<x-app-layout>
    <!-- Inclusió d'un fitxer d'estils CSS específic per a aquesta vista -->
    <link rel="stylesheet" href="{{ asset('create.css') }}">

    <!-- Definició de l'slot 'header' amb el títol de la pàgina -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar article
        </h2>
    </x-slot>

    <!-- Cos de la pàgina, amb estils per a text -->
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <!-- Formulari d'edició d'articles, amb mètode POST i especificant el mètode HTTP PUT mitjançant un camp ocult -->
        <form method="POST" action="{{ route('articles.update', $article) }}">
            @csrf <!-- Token de seguretat per prevenir atacs de tipus CSRF -->
            @method('PUT') <!-- Especificació del mètode HTTP PUT per actualitzar dades -->

            <!-- Camp de text per a la descripció de l'article -->
            <label for="description">Descripció:</label>
            <textarea id="description" name="description" required>{{ $article->descripcio }}</textarea>

            <!-- Botó per a l'enviament del formulari i actualització de l'article -->
            <button type="submit">Actualitzar article</button>
        </form>
    </div>
</x-app-layout>
