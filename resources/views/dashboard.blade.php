<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Tauler d'articles
        </h2>
    </x-slot>

    <div class="p-6 text-gray-900 dark:text-gray-100">
        <form method="GET" action="{{ route('dashboard') }}">
            <label for="nombreArticles">Articles per pàgina:</label>
            <select name="nombreArticles" id="nombreArticles" onchange="this.form.submit()">
                <option value="5" {{ $numArt == 5 ? 'selected' : '' }}>5</option>
                <option value="10" {{ $numArt == 10 ? 'selected' : '' }}>10</option>
                <option value="15" {{ $numArt == 15 ? 'selected' : '' }}>15</option>
            </select>
        </form>

        @if ($articles->count())
            <ul>
                @foreach ($articles as $article)
                    <li>
                        {{ $article->id }} - {{ $article->descripcio }}
                        <a href="{{ route('articles.edit', $article) }}" class="button">📝</a>
                        <form action="{{ route('articles.destroy', $article) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">❌</button>
                        </form>
                    </li>
                @endforeach
            </ul>
            <button>Afegir article 🆕</button>
            <div class="pagination-links">
                {{ $articles->links() }}
            </div>
        @else
            <p>No tens cap article encara</p>
            <button>Afegir article 🆕</button>
        @endif
    </div>

</x-app-layout>


