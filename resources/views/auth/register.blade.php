<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="Background"></div>
    <div class="Register__container">
        <div class="Box">
            <div class="Register__header">
                <div class="App__logo">
                    <span><i class="fas fa-comment"></i></span> Telergan
                </div>
                <div class="pull-right">
                    <button class="btn btn-primary" id="form_button">Daftar</button>
                </div>
            </div>
            <div class="Register__form">
                <div class="Form__header">
                    <p><b>Sign up</b> or <b>Login</b></p>
                    <span class="description">
                        please fill in the form of full name, email, and password to register
                    </span>
                </div>
                <div class="Form__body">
                    <form id="form_register" method="POST" action="{{ route('register') }}">
                        @csrf
                        <input id="name" type="text" placeholder="Nama Lengkap" class="{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                        <input id="email" type="email" placeholder="Email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        <input id="password" type="password" placeholder="Kata Sandi" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}" required autofocus>
                        <input id="password-confirm" type="password" placeholder="Konfirmasi Kata Sandi" class="{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" required autofocus>
                    </form>
                </div>
            </div>
        </div>
        <div class="Register__footer">
            Welcome to the official Telergan.
        </div>
    </div>
    <script>
        let button = document.getElementById('form_button');
        button.addEventListener('click', () => {
            document.getElementById('form_register').submit();
        })
    </script>
</body>
</html>
