<nav class="flex items-center justify-between px-8 py-4 shadow-md bg-white">
    {{-- Partie gauche (Logo + liens selon la page) --}}
    <div class="flex items-center space-x-4">
        <img src="../../dist/assets/img/logo2.png" alt="Logo" class="h-8">

        {{-- Lien Home / Réunions / Blogs (pages internes uniquement) --}}
        @if (!Request::is('users/reunions/home'))
    <a href="{{ route('users.reunions.home') }}" class="text-gray-600 hover:text-blue-600">Hoons</a>
    <a href="{{ route('users.reunions.documentation') }}" class="text-gray-600 hover:text-blue-600">Documentation</a>
@endif

    </div>

    {{-- Partie droite (Login/Sign Up ou Profil + Notification) --}}
    <div class="flex items-center space-x-4">
        {{-- Sur la page d’accueil : Login + Sign Up --}}
        @if (Request::is('users/reunions/home'))
            <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600">Login</a>
            <a href="{{ route('register') }}" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Sign Up</a>
        @else
            {{-- Sur les pages internes : Profil + Notifications --}}
            <i class="fas fa-bell text-gray-600 hover:text-blue-600"></i>
            <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>Profil</span>
            </button>
        @endif
    </div>
</nav>




