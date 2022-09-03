<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Réinitialiser le mot de passe</title>

    <script src=" {{ asset('js/windowAccess.js') }} "></script>
    <script src=" {{ asset('js/connexion/login.js') }} "></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <link rel="stylesheet" href=" {{ asset('css/connexion/login.css') }} ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body onload="controlLab()">

    <div class="container">
        <form method="POST" action=" {{ route('reset.password.post') }} " class="left">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            {{-- ***************************************************** --}}
            @if (session()->has('error'))
                <div class="popup-wrap">
                    <div class="popup-box">
                        <h2>Une erreur se produite!</h2>
                        <h3>{{ session()->get('error') }}.</h3>
                        <a class="close-btn popup-close" href="#">x</a>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('.focus-border').append('<style>#log-title:before{width: 0;}</style>');
                        $('.log').fadeOut(300);
                        $('.popup-wrap').fadeIn(500);
                        $('.popup-box').removeClass('transform-out').addClass('transform-in');
                    });
                </script>
            @endif
            <script>
                $('.popup-close').click(function(e) {
                    $('.popup-wrap').fadeOut(300);
                    $('.popup-box').removeClass('transform-in').addClass('transform-out');
                    $('.focus-border').append('<style>#log-title:before{width: 100%;}</style>');
                    $('.log').fadeIn(500);
                    e.preventDefault();
                });
            </script>
            {{-- ***************************************************** --}}
            {{-- ***************************************************** --}}
            <h2 id="log-title" class="log"><b>Réinitialiser le mot de passe</b></h2>
            {{-- ***************************************************** --}}
            <div class="icons log">
                <div class="social-icon"><span class="fa fa-facebook-f"></span></div>
                <div class="social-icon"><span class="fa fa-linkedin"></span></div>
                <div class="social-icon"><span class="fa fa-google-plus"></span></div>
            </div>
            {{-- ***************************************************** --}}
            <div class="login-box log">
                <div class="col input-effect">
                    <input name="email" class="border-effect" type="email" value="{{ old('email') }}"
                        placeholder="" autocomplete="email">
                    <label><span class="fa fa-user-o" style="margin-right: 2%"></span>E-mail</label>
                    <span class="focus-border"></span>
                    @error($errors->has('email'))
                        <span class="invalid-feedback" role="alert" style="color: red">
                            <i>* {{ $message }}</i>
                        </span>
                    @enderror
                </div>
                <div class="col input-effect">
                    <input name="password" class="border-effect" type="password" placeholder=""
                        autocomplete="current-password">
                    <label><span class="fa fa-lock" style="margin-right: 2%"></span>Mot de passe</label>
                    <span class="focus-border"></span>
                    @error($errors->has('password'))
                        <span class="invalid-feedback" role="alert" style="color: red">
                            <i>* {{ $message }}</i>
                        </span>
                    @enderror
                </div>

                <div class="col input-effect">
                    <input name="password_confirmation" class="border-effect" type="password" placeholder="" required>
                    <label><span class="fa fa-lock" style="margin-right: 2%"></span>Confirmer le mot de passe</label>
                    <span class="focus-border"></span>
                    @error($errors->has('password_confirmation'))
                        <span class="invalid-feedback" role="alert" style="color: red">
                            <i>* {{ $message }}</i>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="login-btn">
                <button type="submit" class="btn">Réinitialiser</button>
                <span class="focus-border">
                    <i></i>
                </span>
            </div>
            {{-- ***************************************************** --}}
        </form>

        <div class="right">
            <h1>Bienvenue</h1>
            <p>Si vous n'avez pas un compte</p>
            <p>Créer un nouveau</p>
            <button class="sign-up"><a class="sign-up-link" href="{{ route('sign-up') }}">Créer un
                    compte</a></button>
        </div>
    </div>

</body>

</html>
