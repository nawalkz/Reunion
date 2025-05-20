<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirmation du mot de passe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body">
    <div class="wrapper">
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="input-field">
                <input id="password" type="password" name="password" class="input-text" required autocomplete="current-password" placeholder="Mot de passe">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="forget">
                <button type="submit" class="register">
                    {{ __('Confirm') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
