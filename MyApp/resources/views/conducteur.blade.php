<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edeg">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link rel="stylesheet" href="/css/Condicteur_Style.css">
        <title>Condicteur</title>
        <meta name="description" content="this is MyApp">
    </head>

    <body>
        <!--------------------------------------------header---------------------------------------------->
        <header>
            <div class="navbar">
                <div class="navbar-container">
                    <div class="logo-container">
                        <a href="#home" class="logo"> <span>My</span> App</a>
                    </div>
                    <div class="menu-container">
                        <ul class="menu-list">
                            <li class="menu-list-item"><a href="#aa">Proposer un trajet</a></li>
                            <li class="menu-list-item"><a href="#Mes-trajets">Les trajets</a></li>
                            <li class="menu-list-item"><a href="#fr">Facture</a></li>
                            <li class="menu-list-item"><a href="#Feedback">Feedback</a></li>
                        </ul>
                    </div>
                    <div class="profile-container">
                        <img class="profile-picture" src="/img/Profile_Icon.png" alt="">
                        <div class="profile-text-container">
                            <span class="profile-text"><a href="#prf">Profile</a></span>
                        </div>
                    </div>
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
                </div>
            </div>
        </header>
        <!--------------------------------------------home---------------------------------------------->
        <section class="main" id="home">
            <form class="ff">
                <div class="content">
                    <span class="Bienvenue">Salut...</span>
                    <h3>Proposer <span class="ttt">un trajet</span></h3>
                    <p>Sans voyager seul dans votre voiture à chaque fois, partagez votre trajet avec les passagers et gagnez la compagnie et de l'argent.</p>
                    <button class="btn">Voir Plus</button>

                </div>
            </form>
            <form class="ff">
                <div class="image">
                    <img src="/img/Condicteur_homme.svg" alt="">
                </div>
            </form>
        </section><!-- fin Main -->
        <!--------------------------------------------proposer-trajet---------------------------------------------->
        <section class="rechercher-trajet" id="aa">
            <div class="title-white">
                <h1>Proposer un trajet </h1>
                <p>Remplissez soigneusement les infoemations</p>
            </div>
            <div class="con-proposer-trajet">
                <div class="row">
                    <form class="form-horizontal" action="{{ route('trajets.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="col-xs-4">
                                <input name="depart" type="text" id="from" placeholder="depart" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
    
                            <div class="col-xs-4">
                                <input name="destination" type="text" id="to" placeholder="destination" class="form-control">
                            </div>
    
                        </div>
                        <div class="form-group">
    
                            <div class="col-xs-4">
                                <input name="date" type="date" placeholder="Date" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <input name="prix" type="text" placeholder="Prix" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-4">
                                <input name="nbr_place" type="text" placeholder="Nombre de place" class="form-control">
                            </div>
                        </div>
                        <div class="Proposer">
                            <button type="submit" class="btn btn-info btn-lg">Proposer</button>
                        </div>
                    </form>
                    <div class="map">
                        <div id="googleMap">
                        </div>
                        <div id="output">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------------------------------mes-trajet---------------------------------------------->
        <section class="rechercher-trajet" id="Mes-trajets">
            <div class="title-white">
                <h1>Toutes vos trajets déja proppser</h1>
                <p>Vous pouvez modifier/supprimer vos tarjets </p>
            </div>
            <div class="con-mes-trajet">
                
                <table class="tbl-mes-trajet" >
                    <tr>
                        <th>Date</th>
                        <th>Départ</th>
                        <th>Destination</th>
                        <th>N.place</th>
                        <th>Prix</th>
                        <th>Les réservations</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                    </tr>
                    @foreach ($trajets as $item)
                    <tr class="anima">
                        <td>{{$item->date}}</td>
                        <td>{{$item->depart}}</td>
                        <td>{{$item->destination}}</td>
                        <td>{{$item->nbr_place}}</td>
                        <td>{{$item->prix}} DA</td>
                        <td><a href="{{ route('reservations.show',$item->id)}}">Réservations</a></td>
                        <td><a href="{{ route('trajets.edit',$item->id)}}"><img src="/img/Tabl_Edit.png"></a></td>
                        <td>
                            <form action="{{ route('trajets.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="image" src="/img/Tabl_Delete.png" >
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </section>
        <!--------------------------------------------facture---------------------------------------------->
        <section class="rechercher-trajet" id="fr">
            <div class="title-white">
                <h1>La facture de cette mois </h1>
                <p>Si vous ne payez pas les cotisations nécessaires avant la fin du mois, votre compte sera bloqué</p>
            </div>
            <div class="con-facture">
                <div id="invoice" class="effect2">
                    <div id="invoice-bot">
                            <table class="table">
                                <tr class="tabletitle">
                                    <td class="item">
                                        <h2>Num Trajet</h2>
                                    </td>
                                    <td class="Hours">
                                        <h2>Plein bénéfice</h2>
                                    </td>
                                    <td class="Rate">
                                        <h2>Intérét net</h2>
                                    </td>
                                    <td class="subtotal">
                                        <h2>Le prix à payer</h2>
                                    </td>
                                </tr>
                                @foreach ($trajets as $item)
                                <tr class="service">
                                    <td class="tableitem">
                                        <p class="itemtext">#{{$item->id}}</p>
                                    </td>
                                    <td class="tableitem">
                                        <p class="itemtext">{{($item->prix)*($item->nbr_place)}} DA</p>
                                    </td>
                                    <td class="tableitem">
                                        @php
                                            $hh=(($item->prix)*($item->nbr_place))-((($item->prix)*($item->nbr_place))*0.05);
                                        @endphp
                                        <p class="itemtext">{{$hh}} DA</p>
                                    </td>
                                    <td class="tableitem">
                                        @php
                                            $hh=(($item->prix)*($item->nbr_place))*0.05;
                                        @endphp
                                        <p class="itemtext">{{$hh}} DA</p>
                                    </td>
                                </tr>
                                @endforeach
                                
                                    <tr class="tabletitle">
                                    <td></td>
                                    <td></td>
                                    <td class="Rate">
                                        <h2>Total</h2>
                                    </td>
                                    <td class="payment">
                                    @php
                                        $jj=0;
                                    @endphp
                                    @foreach ($trajets as $item)
                                    @php
                                        $jj=$jj+(($item->prix)*($item->nbr_place))*0.05;
                                    @endphp
                                    @endforeach
                                    <h2>{{$jj}}</h2>
                                    </td>
                                    </tr>
                            </table>
                        <!--End Table-->
                        <!--- BOTTOM FACTURE !-->
                        <div class="ft">
                            <form action="{{route('factures.store')}}" method="POST">
                                @csrf
                                <input name="user_id" value="{{Auth::user()->id}}" hidden>
                                @php
                                    $jj=0;
                                @endphp
                                @foreach ($trajets as $item)
                                @php
                                    $jj=$jj+(($item->prix)*($item->nbr_place))*0.05;
                                @endphp
                                @endforeach
                                <input name="montant" value="{{$jj}}" hidden>
                                <button type="submit" class="btn-payer">Payer</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--------------------------------------------feedback---------------------------------------------->
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
        </section>
        <!--------------------------------------------fine---------------------------------------------->
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAo4gwt-rYGoExd4s8X27N9Kzybbc2W5ac&libraries=places">
            </script>
        
    </body>
</html>