<?php

namespace App\Http\Controllers;

use App\Models\Demandeinscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DemandeinscriptionController extends Controller
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
    public function create()
    {
        //
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
            'name' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
            'genre' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'nump' => ['required', 'digits:4'],
            'numc' => ['required', 'digits:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $Demandeinscription = new Demandeinscription();

        $Demandeinscription->name = $request->name;
        $Demandeinscription->prenom = $request->prenom;
        $Demandeinscription->genre = $request->genre;
        $Demandeinscription->date = $request->date;
        $Demandeinscription->nump = $request->nump;
        $Demandeinscription->numc = $request->numc;
        $Demandeinscription->email = $request->email;
        $Demandeinscription->password = $request->password;
        $Demandeinscription->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demandeinscription  $demandeinscription
     * @return \Illuminate\Http\Response
     */
    public function show(Demandeinscription $demandeinscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demandeinscription  $demandeinscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Demandeinscription $demandeinscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Demandeinscription  $demandeinscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Demandeinscription $demandeinscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demandeinscription  $demandeinscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demandeinscription $demandeinscription)
    {
        $demandeinscription->delete();
        return redirect()->route('trajets.index');
    }
}