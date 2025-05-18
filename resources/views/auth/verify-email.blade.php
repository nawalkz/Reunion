<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vérification Email</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="wrapper">

        <!-- Message principal -->
        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        <!-- Si lien de vérification a été renvoyé -->
        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <!-- Boutons -->
        <div class="mt-4 flex items-center justify-between">

            <!-- Bouton Resend -->
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="register">
                    {{ __('Resend Verification Email') }}
                </button>
            </form>

            <!-- Bouton Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</body>
</html>
