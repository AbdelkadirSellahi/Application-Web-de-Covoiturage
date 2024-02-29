<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="/css/Admin_Style.css">

</head>

<body>




    <div id="menu-bars" class="fas fa-bars"></div>

    <!-- header section starts  -->

    <header>

        <a href="#" class="logo"> <span>My</span> App</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#demandes">Les demandes</a>
            <a href="#Inviter">Inviter Autre Admin</a>
            <a href="#utilisateurs">Les utilisateurs</a>
            <a href="#trajets">Les trajets Proposer</a>
            <a href="#réservations">Les réservations</a>
            <a href="#Feedback">Les Feedback</a>
            <a href="#Profile">{{ Auth::user()->name }}</a>
            <li class="logout-container">
                <div class="logout-div">
                    <a class="logout-a" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </nav>

       

    </header>

    <!-- header section ends -->

    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <span class="hi"> Salut... </span>
            <h3> Gère <span> L'applications </span> </h3>
            <p class="text"> vous ete le Personne qui gère L'applications!,sur tout la validation des demandes des
                conducteurs</p>
            <a href="#about" class="btn">about me</a>
        </div>

        <div class="image">
            <img src="/img/Admin1.svg" alt="">
        </div>

    </section>

    <!-- home section ends -->

    <!-- about section starts  -->
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <section class="demandes" id="demandes">
        <h1 class="heading"> Les demandes <span> D'inscription </span> </h1>
        <div class="box-tbl">
            <table class="tbl-Les-demandes-inscription">
                <tr>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>permis</th>
                    <th>carte grise</th>
                    <th>Valider</th>
                    <th>Supprimer</th>
                </tr>
                @foreach ($demandeinscriptions as $newdata)
                    <tr class="anima">
                        <td>{{$newdata->name}}</td>
                        <td>{{$newdata->prenom}}</td>
                        <td>{{$newdata->email}}</td>
                        <td>{{$newdata->genre}}</td>
                        <td>{{$newdata->nump }}</td>
                        <td>{{$newdata->numc}}</td>
                        <td>
                        <form action="{{ route('admins.store') }}"  method="POST">
                            @csrf
                            <input name="userType" value="conducteur" hidden >
                            <input name="name" value="{{$newdata->name }}" hidden >
                            <input name="prenom" value="{{$newdata->prenom }}" hidden >
                            <input type="date" name="date" value="{{$newdata->date }}" hidden >
                            <input name="email" value="{{$newdata->email }}" hidden >
                            <input name="genre" value="{{$newdata->genre }}" hidden >
                            <input type="password" name="password" value="{{$newdata->password }}" hidden >
                            <input type="password" name="password_confirmation" value="{{$newdata->password}}" hidden >
                            <input name="numc" value="{{$newdata->numc}}" hidden >
                            <input name="nump" value="{{$newdata->nump}}" hidden >
                            <button type="submit" class="btn">accepter</button>
                            {{-- <input type="image" src="/img/Tabl_Checkmark.png" > --}}
                        </form>
                        </td>
                        <td>
                            <form action="{{ route('demandeinscriptions.destroy', $newdata->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="image" src="/img/Tabl_Delete.png" >
                            </form>
                        </td>
                @endforeach
            </table>
        </div>
        </div>
    </section>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <!-- about section ends -->

    <!-- service section starts  -->

    <section class="Inviter" id="Inviter">

        <h1 class="headingg"> Inviter Autre <span> admin </span> </h1>

        <div class="box-container">
            <div class="container-center">
                <form action="{{ route('admins.store') }}" class="container" method="POST">
                    @csrf
                    <input name="userType" value="admin" hidden >
                    <input name="nump" value="0000" hidden >
                    <input name="numc" value="0000" hidden >
                    <h1 class="Autre-admin">Inviter</h1>
                    <div class="con-lbl">
                        <div class="txt_field2">
                            <div class="text">
                                <input type="text" name="name" placeholder="Nom" class="@error('name') is-invalid @enderror" value="{{ old('name') }}" required autocomplete="name" >
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                <span></span>
                            </div>

                            <div class="text">
                                <input type="text" name="prenom" placeholder="Prenom" value="{{ old('prenom') }}" required>
                                <span></span>
                            </div>
                        </div>

                        <div class="txt_field2">
                            <div class="text">
                                <input type="text" name="genre" placeholder="Gern" value="{{ old('genre') }}" required>
                                <span></span>
                            </div>

                            <div class="text">
                                <input type="date" name="date" placeholder="Date de naissance" required>
                                <span></span>
                            </div>
                        </div>

                        <div class="txt_field">
                            <input type="text" name="email" placeholder="Email" class="@error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <span></span>
                        </div>

                        <div class="txt_field2">
                            <div class="text">
                                <input type="password" name="password" placeholder="Mot de passe" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span></span>
                            </div>

                            <div class="text">
                                <input type="password" name="password_confirmation" placeholder="Confirmer" required>
                                <span></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btnn">Inviter</button>
                </form>

                <form action="" class="Image" method="post">
                    <p class="imgg">L'administrateur peut inviter d'autres administrateur à gérer le contenu</p>
                    <img src="/img/Admin2.svg">
                </form>
            </div>
        </div>

    </section>
    <!-- ----------------------------------------------------------------------------------------------------------------- -->
    <!-- service section ends -->

    <!-- experience section starts  -->

    <section class="utilisateurs" id="utilisateurs">

        <h1 class="heading"> La liste des <span>utilisateurs</span> </h1>

        <div class="box-tbl">
            <table class="tbl-Les-utilisateurs">
                <tr>
                    <th>Utilisateur Comme</th>
                    <th>Date d'inscription</th>
                    <th>Nom</th>
                    <th>Prenom</th>
                    <th>Email</th>
                    <th>Genre</th>
                    <th>La dete </th>
                </tr>
                @foreach ($users as $data)
                    <tr class="anima">
                        <td>{{$data->userType}}</td>
                        <td>{{$data->created_at}}</td>
                        <td>{{$data->name}}</td>
                        <td>{{$data->prenom}}</td>
                        <td>{{$data->email }}</td>
                        <td>{{$data->genre}}</td>
                        <td>{{$data->date}}</td>
                @endforeach
            </table>
        </div>

    </section>

    <!-- experience section ends -->

    <!-- portfolio section starts  -->

    <section class="trajets" id="trajets">

        <h1 class="heading"> les trajets <span> proposer </span> </h1>

        <div class="box-tbl">
            <table class="tbl-Les-trajets">
                <tr>
                    <th>Trajet</th>
                    <th>Condicteur</th>
                    <th>Date</th>
                    <th>Depart</th>
                    <th>Destination</th>
                    <th>N.places</th>
                    <th>Le prix</th>
                </tr>
                @foreach ($trajets as $item)
                    <tr class="anima">
                        <td>#{{$item->id}}</td>
                        @foreach ($users as $data)
                        @if ($item->user_id === $data->id)
                          <td>{{$data->name}}</td>
                        @endif
                        @endforeach
                        <td>{{$item->date}}</td>
                        <td>{{$item->depart}}</td>
                        <td>{{$item->destination}}</td>
                        <td>{{$item->nbr_place}}</td>
                        <td>{{$item->prix}} DA</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </section>

    <!-- portfolio section ends -->

    <!-- contact section starts  -->

    <section class="réservations" id="réservations">

        <h1 class="heading"> Les réservations <span> des trajets </span> </h1>

        <div class="box-tbl">
            <table class="tbl-Les-reseravations">
                <tr>
                    <th>Passager</th>
                    <th>Trajet</th>
                    <th>Conducteur</th>
                    <th>Date</th>
                    <th>Depart</th>
                    <th>Destination</th>
                    <th>N.places</th>
                    <th>Prix</th>
                </tr>
                <tr class="anima">
                    <td>sellahi</td>
                    <td>#123</td>
                    <td>benzahra</td>
                    <td>202-03-04</td>
                    <td>mila</td>
                    <td>anaba</td>
                    <td>2</td>
                    <td>400 DA</td>
                </tr>
                <tr class="anima">
                    <td>sellahi</td>
                    <td>#124</td>
                    <td>benzahra</td>
                    <td>202-03-07</td>
                    <td>anaba</td>
                    <td>alger</td>
                    <td>1</td>
                    <td>700 DA</td>
                </tr>
                <tr class="anima">
                    <td>boussof</td>
                    <td>#13</td>
                    <td>benzahra</td>
                    <td>202-09-04</td>
                    <td>anaba</td>
                    <td>mila</td>
                    <td>2</td>
                    <td>400 DA</td>
                </tr>

            </table>
        </div>


    </section>

    <!-- contact section ends -->
    <section class="Feedback" id="Feedback">

        <h1 class="heading"> La liste des <span> Feedback </span> </h1>
        <div class="box-tbl">
            <table class="tbl-Les-feedback">
                <tr>
                    <th>Utilisateur</th>
                    <th>Le Nom</th>
                    <th>Le Prenom</th>
                    <th>La Date</th>
                    <th>Le feedback</th>
                    <th>Supprimer</th>
                </tr>
                @foreach ($feedbacks as $datafeed)
                <tr class="anima">
                    @foreach ($users as $data)
                    @if ($datafeed->user_id === $data->id)
                      <td>{{$data->userType}}</td>
                      <td>{{$data->name}}</td>
                      <td>{{$data->prenom}}</td>
                    @endif
                    @endforeach
                    <td>{{$datafeed->created_at}}</td>
                    <td>{{$datafeed->description_feedback}}</td>
                    <td>
                        <form action="{{ route('feedbacks.destroy',  $datafeed->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input class="imag" type="image" src="/img/Tabl_Delete.png" >
                        </form>
                    </td>
                </tr>
            @endforeach

            </table>
        </div>
    </section>
    <section class="Feedback" id="tauxdegains">

        <h1 class="heading"> Tauxdegains </h1>
        <div class="box-tbl">
            <table class="tbl-Les-feedback">
                <tr>
                    <th>pourcentage</th>
                    <th>last updated</th>
                    <th>updated</th>
                </tr>
                @foreach ($tauxdegains as $datatt)
                <tr class="anima">
                    <td>{{$datatt->pourcentage}}</td>
                    <td>{{$datatt->updated_at}}</td>
                    <td><a href="{{route('tauxdegains.edit',$datatt->id)}}">update</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
    <section class="Profile" id="Profile">

        <h1 class="heading"> Les informations de votre <span> profile </span> </h1>

        <div class="center">
            <h2>Administrateur</h2>

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
                        <label class="org">Bloquer votre compte?</label>
                        <a href="#">Bloquer</a>
                    </div>
                </form>

            </div>
        </div>
    </section>
    <!-- footer section  -->
    <footer class="footer">
        created by 
        <span> mr. Sellahi and mr. Benzahra </span> 
        | all rights reserved! 
        {{-- <div class="follow">
            <a href="#" class="fab fa-facebook-f"></a>
            <a href="#" class="fab fa-twitter"></a>
            <a href="#" class="fab fa-instagram"></a>
            <a href="#" class="fab fa-linkedin"></a>
        </div> --}}
    </footer>
    <!-- custom js file link  -->
    <script src="/js/Admin_Js.js"></script>

</body>

</html>