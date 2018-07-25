<?php

namespace Homeserver\Http\Controllers;

use Homeserver\Gerecht;
use Illuminate\Http\Request;

class GerechtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gerechts = \Homeserver\Gerecht::all();
        return view('gerechten.overzicht')->with('gerechts', $gerechts);
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
     * @param  \Homeserver\Gerecht  $gerecht
     * @return \Illuminate\Http\Response
     */
    public function show(Gerecht $gerecht)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Homeserver\Gerecht  $gerecht
     * @return \Illuminate\Http\Response
     */
    public function edit(Gerecht $gerecht)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Homeserver\Gerecht  $gerecht
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gerecht $gerecht)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Homeserver\Gerecht  $gerecht
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gerecht $gerecht)
    {
        //
    }
}
