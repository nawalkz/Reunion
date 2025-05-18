<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <h1>Log in</h1>
            <!-- Email -->
            <div class="input-field">
                <label for="">Email</label> <br>
                <input type="email" id="email" name="email" class="input-text" value="{{ old('email') }}" required autofocus autocomplete="username">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="input-field">
                <label for="">Password</label> <br>
                <input type="password" id="password" name="password" class="input-text" required autocomplete="current-password" class="input-field">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="remember">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                    <span class="ms-2 text-sm text-white-600">Remember me</span>
                </label>
            </div>

            <!-- Submit + Forgot Password -->
            <div class="forget">
                @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    Forgot your password?
                </a>

                @endif
                <br>
                <button type="submit" class="register">
                    Log in
                </button>

            </div>
        </form>
    </div>
</body>

</html>