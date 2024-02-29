<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edeg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="/css/Authentification_Style.css">
        <title>MyApp</title>
        <meta name="description" content="this is MyApp">
    </head>

    <body>
        <div class="container">
            <div class="signin-signup">
                <form class="sign-in-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <h2 class="title"><span>Se</span> Connecter</h2>
                    <div class="txt_field">
                        <input type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"autocomplete="email" autofocus  required >
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                        <span></span>
                        <label>Adresse e-mail</label>
                    </div>
                    <div class="txt_field">
                        <input type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror
                        <span></span>
                        <label>Mot de pass</label>
                    </div>
                    {{-- <div class="pass">Mot de passe oublié ?</div> --}}
                    @if (Route::has('password.request'))
                    <a class="pass" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié ?') }}
                    </a>
                    @endif
                    <input type="submit" value="Se Connecter" class="btn">
                    <p class="account-text">Pas un membre? <a href="#" id="sign-up-btn2">S'inscrire</a></p>
                </form>
                <form action="" class="sign-up-form">
                    <h2 class="title">S'inscrire</h2>
                    <a href="{{ route('inscrirep')}}"><input type="button" value="Passager" class="btn"></a>
                    <a href="{{ route('inscrirec')}}"><input type="button" value="Conducteur" class="btn"></a>
                    <p class="account-text">vous ete un membre? <a href="#" id="sign-in-btn2">Se Connecter</a></p>
                </form>
            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>Avez-vous un compte ?</h3>
                        <p></p>
                        <button class="btn" id="sign-in-btn">Se Connecter</button>
                    </div>
                    <img src="/img/Authentification1.svg" alt="" class="image">
                </div>
                <div class="panel right-panel">
                    <div class="content">
                        <h3>Vous n'avez pas un compte ?</h3>
                        <p>Commencez avec un compte MYAPP gratuit,
                            Pas de carte de crédit nécessaire!</p>
                        <button class="btn" id="sign-up-btn">S'inscrire</button>
                    </div>
                    <img src="/img/Authentification2.svg" alt="" class="image">
                </div>
            </div>
        </div>
        <script src="/js/Authentification_Js.js">

        </script>
    </body>

    </html>