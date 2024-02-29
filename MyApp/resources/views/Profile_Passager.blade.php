<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edeg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="/css/Profile_Passager_Style.css">
        <title>Profile-Passager</title>
        <meta name="description" content="this is MyApp">
    </head>

    <body>
        <section class="container" id="Mon-Profile">

            <div class="title">
                <h1>les informations de votre profile</h1>
                <p>Vous pouvez modifier vos informations ou bloquer vos compte </p>
            </div>

            <div class="center">
                <h2>Passager</h2>

                <div class="con-center">

                    <form action="" class="nom" method="post">
                        <div class="txt_field">
                            <label class="org">Nom :</label>
                            <label class="newlbl">{{ Auth::user()->name }}</label>
                        </div>
                        <div class="txt_field">
                            <label class="org">Date de Naissance :</label>
                            <label class="newlbl">{{ Auth::user()->date }}</label>
                        </div>
                        <div class="txt_field">
                            <label class="org">Email :</label>
                            <label class="newlbl">{{ Auth::user()->email }}</label>
                        </div>
                        <div class="txt_field">
                            <label class="org">Modifier votre compte?</label>
                            <a href="#">Modifier</a>
                        </div>
                    </form>

                    <form action="" class="prenom" method="post">
                        <div class="txt_field">
                            <label class="org">Prenom :</label>
                            <label class="newlbl">{{ Auth::user()->prenom }}</label>
                        </div>
                        <div class="txt_field">
                            <label class="org">Genre :</label>
                            <label class="newlbl">{{ Auth::user()->genre }}</label>
                        </div>
                        <div class="txt_field">
                            <label class="org">Modifier mot de passe/email?</label>
                            <a href="#">Modifier sécurité</a>
                        </div>
                        <div class="txt_field">
                            <label class="org"> Bloquer votre compte?</label>
                            @foreach($user as $itemm)
                            <form method="POST" action="{{route('delete',$itemm->id)}}">
                                @csrf
                                {{-- <input type="hidden" value="{{Auth::user()->id}}" name="id"> --}}
                                {{-- <a type="post" href="{{url('/delete'.id)}}">bloquer</a> --}}
                                <button type="submit" class="btn ">bloquer</button>
                            </form>
                            @endforeach
                            
                            
                            {{-- @php
                                $myid=Auth::user();
                            @endphp
                            <form action="{{route('users.destroy',compact('myid'))}}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <label class="org"> Bloquer votre compte?</label>
                                <button type="submit"> Bloquer </button>
                            </form> --}}
                        </div>
                    </form>

                </div>

            </div>

        </section><!-- fin mon-profile -->
        {{-- <script src="/js/Profile_Passager_Js.js"></script> --}}
    </body>

</html>