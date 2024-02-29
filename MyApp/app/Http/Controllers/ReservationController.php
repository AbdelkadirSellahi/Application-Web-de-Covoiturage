<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->myid != null) {
            $req = $_GET['myid'];
            $trajets = Trajet::where('id', 'LIKE', '%' . $req . '%')->get();
            return view('add', compact('trajets'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Trajet $trajet)
    {


        $request->validate([
            'nbr_place' => 'required',
            'trajet_id' => 'required',
        ]);

        $reservations = Reservation::create([
            'user_id' => Auth::user()->id,
            'trajet_id' =>  $request->trajet_id,
            'nbr_place' => $request->nbr_place,
        ]);

        return redirect()->route('trajets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::where('trajet_id', '=', 'id')->get();
        return view('reservationshow', compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservation $reservation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservation  $reservation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservation $reservation)
    {
        //
    }
}