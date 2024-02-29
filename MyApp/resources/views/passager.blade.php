<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edeg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="/css/Passager_Style.css">
        <title>Passager</title>
        <meta name="description" content="this is MyApp">
    </head>

    <body>
        <header>
            <div class="navbar">
                <div class="navbar-container">
                    <div class="logo-container">
                        <a href="#home" class="logo"> <span>My</span> App</a>
                    </div>
                    <div class="menu-container">
                        <ul class="menu-list">
                            <li class="menu-list-item active"><a href="#trajet">Recharcher un trajet</a></li>
                            <li class="menu-list-item"><a href="#Ma-réservation">Ma réservation</a></li>
                            <li class="menu-list-item"><a href="#Feedback">Feedback</a></li>
                        </ul>
                    </div>
                    <div class="profile-container">
                        <img class="profile-picture" src="/img/Profile_Icon.png" alt="">
                        <div class="profile-text-container">
                            <span class="profile-text"><a href="{{ route('profiles.index',Auth::user()->id)}}">{{ Auth::user()->name }}</a></span>
                        </div>
                    </div>
                    
                        <div class="menu-list-l">
                            <a class="menu-list-logout" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Déconecter') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    
                </div>
            </div>
            
        </header>
        <!--------------------------------------------home---------------------------------------------->
        <section class="main" id="home">
            <form class="ff">
                <div class="content">
                    <span class="Bienvenue">Salut...</span>
                    <h3>Trouvez <span class="ttt">un trajet</span></h3>
                    <p>trouvez le trajet parfait parmi notre large éventail de destinations et d'itinéraires à bas
                        prix.</p>
                    <button class="btn">Voir Plus</button>

                </div>
            </form>
            <form class="ff">
                <div class="image">
                    <img src="/img/Passager_homme.svg" alt="">
                </div>
            </form>
        </section><!-- fin Main -->

        <section class="rechercher-trajet" id="trajet">
            <div class="jumbotron">
                <div class="container-fluid">
                    <div class="title-white">
                        <h1>Rechercher un trajet entre deux endroits</h1>
                        <p>Cette application vous aidera à trouver le moins cher trajet de déplacement </p>
                    </div>
                    <form type="get" action="{{route('trajets.index')}}" class="form-horizontal">
                        <div class="form-group">
                            <div class="col">
                                <input name="depart_r" type="text" id="from" placeholder="depart" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <input name="destination_r" type="text" id="to" placeholder="destination" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col">
                                <input name="date_r" type="date" placeholder="Date" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-offset-2 col-xs-10">
                            <button class="btn btn-info btn-lg">Recharcher</button>
                        </div>
                    </form>
                   
                </div>
            </div>
            <div class="row">
                <form type="get" action="{{route('reservations.create')}}">
                    <table class="tbl-reseravtion">
                        <tr>
                            <th>Condicteur</th>
                            <th>Prix</th>
                            <th>Nombre de place</th>
                            <th>Réserver</th>
                        </tr>
                        @if($trajets != [null])
                            @if($users != [null])
                            @foreach ($trajets as $item)
                            <tr class="anima">
                                    @foreach ($users as $data)
                                        @if ($item->user_id === $data->id)
                                            <td>{{$data->name}}</td>
                                        @endif
                                    @endforeach
                                <td>{{$item->prix}} DA</td>
                                <td>{{$item->nbr_place}}</td>
                                    <input name="myid" value="{{$item->id}}" hidden>
                                    <td><button class="btn btn-info btn-lg">reserver</button></td>
                            </tr>
                            @endforeach
                            @endif
                        @endif
                        
                    </table>

                </form>
                <div class="map">
                    <div id="googleMap">
                    </div>
                    <div id="output">
                    </div>
                </div>
            </div>
        </section><!-- fin rechercher-un-trajet -->

        <section class="rechercher-trajet" id="Ma-réservation">
            <div class="title-white">
                <h1>Toutes vos Réservatios</h1>
                <p>Vous pouvez annuler vos réservations ou modifier (nombre de places)</p>
            </div>
            <div class="con-table">
                <table class="tbl-reseravtion">
                    <tr>
                        <th>Condicteur</th>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>Nombre de place</th>
                        <th>Modifier</th>
                        <th>Annuler</th>
                    </tr>
                </table>
            </div>
        </section><!-- fin ma-reservation -->

        <section class="rechercher-trajet" id="Feedback">
            <div class="title-white">
                <h1>Passer un feedback sur l'application</h1>
                <p>Vous nous aiderez à fournir un bon service</p>
            </div>
            <form action="{{ route('feedbacks.store')}}" method="POST">
                @csrf
                <div class="con-feedback">
                    <textarea class="txt-feedback" name="description_feedback" rows="5" cols="48" placeholder="écrit.."></textarea>
                </div>
                <button type="submit" class="btnfeedback">Envoyer</button>
            </form>
        </section><!-- fin feedback -->
        <!-- footer section  -->
        <footer class="footer"> created by <span> mr. S.Abdelkadir </span> | all rights reserved! </footer>
        <!-- custom js file link  -->

        {{-- <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo4gwt-rYGoExd4s8X27N9Kzybbc2W5ac&libraries=places">
            </script>
        <script src="/js/Passager_Js.js">
        </script> --}}
    </body>
</html>