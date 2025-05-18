<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Réinitialiser le mot de passe</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="input-field">
                <label for="email">
                    <span class="first-letter">Email</span>
                    <span class="second-letter">*</span>
                </label>
                <input id="email" class="input-text" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                @error('email')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Password -->
            <div class="input-field">
                <label for="password">
                    <span class="first-letter">Mot de passe</span>
                    <span class="second-letter">*</span>
                </label>
                <input id="password" class="input-text" type="password" name="password" required autocomplete="new-password">
                @error('password')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="input-field">
                <label for="password_confirmation">
                    <span class="first-letter">Confirmer mot de passe</span>
                    <span class="second-letter">*</span>
                </label>
                <input id="password_confirmation" class="input-text" type="password" name="password_confirmation" required autocomplete="new-password">
                @error('password_confirmation')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="forget">
                <button type="submit" class="register">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </form>
    </div>
</body>
</html>
