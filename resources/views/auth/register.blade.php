<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="body">
    <div class="wrapper">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div class="input-field">
               
                <input type="text" id="name" name="name" class="input-text" value="{{ old('name') }}" required autofocus autocomplete="name" placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Email -->
            <div class="input-field">
               
                <input type="email" id="email" name="email" class="input-text" value="{{ old('email') }}" required autocomplete="username" placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="input-field">
                
                <input type="password" id="password" name="password" class="input-text" required autocomplete="new-password" placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-field">
                
                <input type="password" id="password_confirmation" name="password_confirmation" class="input-text" required autocomplete="new-password" placeholder="Password confirmation">
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
            </div>
            <!-- Submit -->
            <div class="forget">
                <a class="underline text-sm text-white-600 dark:text-white-400 hover:text-white-900 dark:hover:text-white-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-white-800" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <br> 
                <button type="submit" class="register">
                    {{ __('Register') }}
                </button>
            </div>
        </form>