<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Request $request)
    // {
    //     if ($request->id != null) {
    //         $req = $_GET['id'];
    //         $delete= User::where('id', 'LIKE', '%' . $req . '%')->delete();
    //         return redirect()->route('trajets.index'); }
    //     // $req = $_GET['id'];
    //     // $id = $request->input('id');
    //     // $delete = User::find($id);
    //     // $delete->delete($delete);
    //     // return redirect()->route('trajets.index');
    // }
    public function delete(Request $request)
    {
        if ($request->id != null) {
            $req = $_GET['id'];
            $delete= User::where('id', 'LIKE', '%' . $req . '%')->delete();
            return redirect()->route('trajets.index'); }
    }
}