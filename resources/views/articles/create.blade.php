<!-- Utilitza el component x-app-layout com a base per a la disposició general de la pàgina -->
<x-app-layout>
    <!-- Enllaça un fitxer d'estils CSS extern per personalitzar l'aspecte de la pàgina -->
    <link rel="stylesheet" href="{{ asset('create.css') }}">

    <!-- Defineix el contingut de la capçalera de la pàgina, incloent-hi un títol -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Afegir nou article
        </h2>
    </x-slot>

    <!-- Cos principal de la pàgina, contenint el formulari per afegir un nou article -->
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <!-- Formulari per a l'enviament de dades del nou article al servidor -->
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf <!-- Inclou un token CSRF per a la seguretat del formulari -->

            <!-- Camp de textàrea per a la descripció de l'article, amb un placeholder com a exemple -->
            <label for="description">Descripció:</label>
            <textarea id="description" name="description" required placeholder="Backend és una..."></textarea>

            <!-- Botó per enviar el formulari i afegir l'article -->
            <button type="submit">Afegir article</button>
        </form>
    </div>
</x-app-layout>
