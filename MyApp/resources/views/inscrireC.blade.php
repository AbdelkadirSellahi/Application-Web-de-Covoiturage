<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edeg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="/css/S'inscrire_Condicteur_Style.css">
        <title>S'inscrire condicteur</title>
        <meta name="description" content="this is MyApp">
    </head>

    <body>
        <div class="center">
            <div class="con-center">
                <form action="{{ route('demandeinscriptions.store') }}" class="container"  method="POST">
                    @csrf
                    <h1><span>Demande</span> D'inscription</h1>
                    <div class="txt_field2">
                        
                        <div class="text">
                            <input name="name" type="text" placeholder="Nom" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span></span>
                        </div>

                        <div class="text">
                            <input name="prenom" type="text" placeholder="Prenom" value="{{ old('prenom') }}" required>
                            <span></span>
                        </div>
                    </div>

                    <div class="txt_field2">
                        <div class="text">
                            <input name="genre" type="text" placeholder="Gern" value="{{ old('genre') }}" required>
                            <span></span>
                        </div>

                        <div class="text">
                            <input name="date" type="date" placeholder="Date de naissance" required>
                            <span></span>
                        </div>
                    </div>

                    <div class="txt_field">
                        <input name="email" type="text" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong> erreur </strong>
                                    </span>
                                @enderror
                        <span></span>
                    </div>

                    <div class="txt_field2">
                        <div class="text">
                            <input type="password" placeholder="Mot de passe" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <span></span>
                        </div>

                        <div class="text">
                            <input type="password" placeholder="Confirmer" name="password_confirmation" required autocomplete="new-password">
                            <span></span>
                        </div>
                    </div>

                    <div class="txt_field">
                        <input name="nump" type="text" placeholder="Numéro de permis" required>
                        <span></span>
                    </div>

                    <div class="txt_field">
                        <input name="numc" type="text" placeholder="Numéro de carte grise" required>
                        <span></span>
                    </div>
                    <button type="submit" class="btn">Envoyer</button>
                </form>

                <form action="" class="Image" method="post">
                    <p>Nous enverrons une réponse de votre demande à votre numéro de téléphone/Email.</p>
                    <img src="/img/S'inscrire_Condicteur.svg">
                </form>
            </div>
        </div>
    </body>
</html>