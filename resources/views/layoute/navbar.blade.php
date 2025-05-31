<nav class="flex items-center justify-between px-12 py-6 shadow-lg bg-white sticky top-0 z-50">
    {{-- Left Side (Logo + Links) --}}
    <div class="flex items-center space-x-6">
        {{-- Logo (Larger) --}}
        <a href="{{ route('users.reunions.home') }}">
            <img src="{{ asset('dist/assets/img/logo2.png') }}" alt="Faure UB Logo" class="h-12 brand-image opacity-75 shadow-lg transition-all duration-300">
        </a>

        {{-- Links: Hidden on mobile, shown on desktop --}}
        <div class="hidden md:flex md:items-center md:space-x-6">
            @if (!Request::is('users/reunions/home'))
                <a href="{{ route('users.reunions.home') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Home</a>
                <a href="{{ route('users.reunions.documentation') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Documentation</a>
            @endif
        </div>
    </div>

    {{-- Right Side (Login/Sign Up or Profile + Notification) --}}
    <div class="flex items-center space-x-6">
        @if (Request::is('users/reunions/home'))
            {{-- On Home Page: Login + Sign Up --}}
            <a href="{{ route('login') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200 hidden md:block">Login</a>
            <a href="{{ route('register') }}" class="text-lg text-white bg-blue-600 px-6 py-3 rounded-lg hover:bg-blue-700 transition-all duration-200 hover:shadow-md">Sign Up</a>
        @else
            {{-- On Internal Pages: Notification + Profile --}}
            @php
    $unreadCount = 0;

    if (Auth::check()) {
        $unreadCount = Auth::user()->notifications()->where('lu', 0)->count();
    }
@endphp

<li class="nav-item">
    <a class="nav-link position-relative" href="{{ route('notifications.index') }}">
        <i class="fas fa-bell text-2xl"></i>
        @if($unreadCount > 0)
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                {{ $unreadCount }}
                <span class="visually-hidden">unread notifications</span>
            </span>
        @endif
    </a>
</li>


            <button class="flex items-center space-x-3 text-gray-600 hover:text-blue-600 transition-colors duration-200" aria-label="User Profile">
                <i class="fas fa-user-circle text-3xl"></i>
                <span class="text-lg hidden md:inline">Profile</span>
            </button>
        @endif

        {{-- Hamburger Menu Button (Visible on Mobile) --}}
        <button id="menu-toggle" class="md:hidden text-gray-600 hover:text-blue-600 transition-colors duration-200" aria-label="Toggle Menu">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    {{-- Mobile Menu (Hidden by Default) --}}
    <div id="mobile-menu" class="hidden md:hidden flex-col space-y-4 mt-6 px-12 bg-white shadow-lg">
        @if (!Request::is('users/reunions/home'))
            <a href="{{ route('users.reunions.home') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Home</a>
            <a href="{{ route('users.reunions.documentation') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Documentation</a>
        @else
            <a href="{{ route('login') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Login</a>
            <a href="{{ route('register') }}" class="text-lg text-gray-600 hover:text-blue-600 transition-colors duration-200">Sign Up</a>
        @endif
    </div>
</nav>