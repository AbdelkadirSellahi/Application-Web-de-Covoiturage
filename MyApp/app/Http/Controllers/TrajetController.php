<?php

namespace App\Http\Controllers;

use App\Models\Demandeinscription;
use App\Models\Feedback;
use App\Models\Reservation;
use App\Models\Tauxdegains;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class TrajetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->userType === 'conducteur') {

            $trajets = Trajet::where('user_id', Auth::id())->get();

            return view('conducteur', compact('trajets'));
        }
        if (Auth::user()->userType === 'admin') {
            $tauxdegains = Tauxdegains::all();
            $demandeinscriptions = Demandeinscription::all();
            $feedbacks = Feedback::all();
            $users = User::all();
            $trajets = Trajet::all();
            return view('admin', compact('trajets', 'users', 'feedbacks', 'demandeinscriptions', 'tauxdegains'));
        }
        if (Auth::user()->userType === 'passager') {

            if ($request->depart_r != null) {
                if ($request->destination_r != null) {

                    $users = User::all();

                    $req = $_GET['depart_r'];
                    $reqq = $_GET['destination_r'];
                    $reqqq = $_GET['date_r'];

                    $trajets = Trajet::where('depart', 'LIKE', '%' . $req . '%')
                        ->where('destination', 'LIKE', '%' . $reqq . '%')
                        ->where('date', 'LIKE', '%' . $reqqq . '%')
                        ->get();

                    return view('passager', compact('users', 'trajets'));
                }
            } else {
                $users = [NULL];
                $trajets = [NULL];
                return view('passager', compact('users', 'trajets'));
            }
        } else {
            return redirect()->route('Authentification');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('Condicteur');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nbr_place' => 'required',
            'depart' => 'required',
            'destination' => 'required',
            'date' => 'required',
            'prix' => 'required',
        ]);

        $trajet = Trajet::create([
            'user_id' => Auth::id(),
            'nbr_place' => $request->nbr_place,
            'depart' => $request->depart,
            'destination' => $request->destination,
            'date' => $request->date,
            'prix' => $request->prix,
        ]);
        return redirect()->route('trajets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function show(Trajet $trajet)
    {

        return  view('conducteur', compact('trajet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function edit(Trajet $trajet)
    {
        return view('trajetedit', compact('trajet'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trajet $trajet)
    {
        $request->validate([
            'nbr_place' => 'required',
            'depart' => 'required',
            'destination' => 'required',
            'date' => 'required',
            'prix' => 'required',
        ]);
        $trajet->update($request->all());
        return redirect()->route('trajets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trajet  $trajet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trajet $trajet)
    {
        $trajet->delete();
        return redirect()->route('trajets.index');
    }
}