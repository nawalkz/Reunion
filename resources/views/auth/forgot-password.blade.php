<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body">
    <div class="wrapper">
        <div class="mb-4 text-sm text-darck-600 dark:text-darck-400">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email -->
            <div class="input-field">
                <input id="email" type="email" name="email" class="input-text" value="{{ old('email') }}" required autofocus placeholder="Email">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>
<br>
            <!-- Submit -->
            <div class="forget-">
                <button type="submit" class="register">
                    {{ __('Email Password Reset Link') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
