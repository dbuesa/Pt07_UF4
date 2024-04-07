<!-- Definició de la disposició de l'aplicació utilitzant el component x-app-layout -->
<x-app-layout>
    <!-- Definició de l'slot 'header' per al component de layout, on es pot personalitzar el contingut de la capçalera -->
    <x-slot name="header">
        <!-- Títol del tauler d'articles, amb estil aplicat per a destacar -->
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tauler d'articles
        </h2>
    </x-slot>

    <!-- Cos principal de la pàgina, amb estils per a text -->
    <div class="p-6 text-gray-900 dark:text-gray-100">
        <!-- Formulari per seleccionar el nombre d'articles per pàgina -->
        <form method="GET" action="{{ route('dashboard') }}">
            <label for="nombreArticles">Articles per pàgina:</label>
            <select name="nombreArticles" id="nombreArticles" onchange="this.form.submit()">
                <!-- Opcions de selecció amb valors predefinits i dinàmics basats en la variable $numArt -->
                <option value="5" {{ $numArt == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $numArt == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ $numArt == 15 ? 'selected' : '' }}>15</option>
            </select>
        </form>

        <!-- Comprovació i llistat dels articles existents -->
        @if ($articles->count())
            <ul>
                <!-- Iteració a través de cada article i mostrant el seu ID i descripció -->
                @foreach ($articles as $article)
                    <li>
                        {{ $article->id }} - {{ $article->descripcio }}
                        <!-- Enllaç per editar l'article, amb un icona d'edició -->
                        <a href="{{ route('articles.edit', $article) }}" class="button">📝</a>
                        <!-- Formulari per eliminar l'article, amb confirmació abans de l'acció -->
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;" onsubmit="return confirm('Estàs segur que vols eliminar aquest article?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">❌</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <!-- Enllaç per afegir un nou article -->
            <a href="{{ route('articles.create') }}" class="afegir">Afegir article 🆕</a>
            <div class="pagination-links">
                <!-- Utilitza la funció 'links' per generar enllaços de paginació automàticament -->
                {{ $articles->links() }}
            </div>
        @else
            <!-- Missatge mostrat quan no hi ha articles -->
            <p>No tens cap article encara.</p>
            <!-- Enllaç per afegir un nou article quan no n'hi ha cap -->
            <a href="{{ route('articles.create') }}" class="afegir">Afegir article 🆕</a>
        @endif
    </div>
</x-app-layout>
