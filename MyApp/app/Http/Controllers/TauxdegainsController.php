<?php

namespace App\Http\Controllers;

use App\Models\Tauxdegains;
use Illuminate\Http\Request;

class TauxdegainsController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tauxdegains  $tauxdegains
     * @return \Illuminate\Http\Response
     */
    public function show(Tauxdegains $tauxdegains)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tauxdegains  $tauxdegains
     * @return \Illuminate\Http\Response
     */
    public function edit(Tauxdegains $tauxdegains)
    {
        return view('tauxdegainsedit', compact('tauxdegains'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tauxdegains  $tauxdegains
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tauxdegains $tauxdegains)
    {
        $request->validate([
            'user_id' => 'required',
            'pourcentage' => 'required',
        ]);
        $tauxdegains->update($request->all());
        return redirect()->route('trajets.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tauxdegains  $tauxdegains
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tauxdegains $tauxdegains)
    {
        //
    }
}