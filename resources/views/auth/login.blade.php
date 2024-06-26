<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Correu electrònic:" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Contrasenya:" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Recorde'm</span>
            </label>
        </div>
        <!-- Contenidor per al botó d'inici de sessió amb Google -->
        <div class="flex items-center justify-end mt-4">
            <!-- Enllaç per iniciar sessió amb Google. -->
            <a href="{{ url('/login-google') }}" class="btn btn-primary" style="background-color: black; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Inicia sessió amb Google
            </a>
        </div>
        <!-- Contenidor per al botó d'inici de sessió amb GitHub -->
        <div class="flex items-center justify-end mt-4">
            <!-- Enllaç per iniciar sessió amb GitHub. -->
            <a href="{{ url('/login-github') }}" class="btn btn-primary" style="background-color: black; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Inicia sessió amb Github
            </a>
        </div>

        @if(session('login_attempts') >= 3)
            <!-- Si l'usuari ha intentat iniciar sessió 3 vegades o més, mostra el Captcha per a la verificació addicional. -->
            <div class="mt-4">
                <!-- Mostra el Captcha. NoCaptcha::display() genera el widget de captcha en la pàgina. -->
                {!! NoCaptcha::display() !!}
                <!-- Inclou els scripts de Javascript necessaris per al funcionament del Captcha. -->
                {!! NoCaptcha::renderJs() !!}
            </div>
        @endif
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    Has oblidat la teva contrasenya?
                </a>
            @endif

            <x-primary-button class="ms-3">
                INICIAR SESSIÓ
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
