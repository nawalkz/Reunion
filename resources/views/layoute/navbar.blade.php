<nav class="flex items-center justify-between px-8 py-4 shadow-md bg-white">
    {{-- Partie gauche (Logo + liens selon la page) --}}
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">

        {{-- Lien Home / Réunions / Blogs (pages internes uniquement) --}}
        @if (!Request::is('/'))
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-blue-600">Home</a>
            <a href="{{ route('meetings.index') }}" class="text-gray-600 hover:text-blue-600">Réunions</a>
            <a href="{{ route('blogs.index') }}" class="text-gray-600 hover:text-blue-600">Blogs</a>
        @endif
    </div>

    {{-- Partie droite (Login/Sign Up ou Profil + Notification) --}}
    <div class="flex items-center space-x-4">
        {{-- Sur la page d’accueil : Login + Sign Up --}}
        @if (Request::is('/'))
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





<!-- <nav class="flex items-center justify-between px-8 py-4 shadow-md bg-white">
    <div class="flex items-center space-x-4">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-8">
    </div>

    <div class="flex items-center space-x-4">
        <a href="#" class="text-gray-600 hover:text-blue-600">Login</a>
        <a href="#" class="text-white bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Sign Up</a>
        <i class="fas fa-bell text-gray-600 hover:text-blue-600"></i>

        <div class="relative">
            <button class="flex items-center space-x-2 text-gray-600 hover:text-blue-600">
                <i class="fas fa-user-circle text-2xl"></i>
                <span>Profil</span>
            </button>
        </div>
    </div>
</nav>

<body> -->
<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Réunions</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reunions.index') }}">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reunions.create') }}">Créer Réunion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

</body>
</html> -->