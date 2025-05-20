<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="body">
    <div class="wrapper">
        <form method="POST" action="{{ route('register.admin') }}" enctype="multipart/form-data">
            @csrf

            <!-- Nom -->
            <div class="input-field">
                <label for="">Name</label> <br>
                <input type="text" id="name" name="name" class="input-text" required autofocus placeholder="Name">
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
             <!-- Email -->
            <div class="input-field">
                  <label for="">Email</label> <br>
                <input type="email" id="email" name="email" class="input-text" required placeholder="Email">
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="input-field">
                <label for="">Password</label> <br>
                <input type="password" id="password" name="password" class="input-text" required placeholder="Password">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Confirm Password -->
            <div class="input-field">
                <label for=""> Confirm Password</label> <br>
                <input type="password" id="password_confirmation" name="password_confirmation" class="input-text" required placeholder="Password confirmation"> 
            </div>
<br>
            <!-- Submit -->
            <div class="-forget">
                <button type="submit" class="register">
                    Enregistrer Admin
                </button>
            </div>
        </form>
    </div>
</body>
</html>
