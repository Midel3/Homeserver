<?php

namespace Homeserver\Http\Controllers;

use Homeserver\Gerecht;
use Homeserver\Vlees;
use Illuminate\Http\Request;

class GerechtController extends Controller
{

    public function index()
    {
        $overzicht = 'gerechten.pervlees';
        return redirect()->action('GerechtController@show', $overzicht);
    }

    public function pervLees()
    {
        $overzicht = 'gerechten.pervlees';
        return redirect()->action('GerechtController@show', $overzicht);
    }

    public function perstarch()
    {
        $overzicht = 'gerechten.perstarch';
        return redirect()->action('GerechtController@show', $overzicht);
    }

    public function show($overzicht)
    {
        $gerechtsByStarch = \Homeserver\Gerecht::orderBy('starch', 'asc')->get();
        $gerechtsByVlees = \Homeserver\Gerecht::orderBy('vlees', 'asc')->get();
        $vlezen = \Homeserver\Vlees::all();
        $starches = \Homeserver\Starch::all();

        return view('gerechten.main', ['gerechtsByStarch' => $gerechtsByStarch, 'gerechtsByVlees' => $gerechtsByVlees,
        'starches' => $starches, 'vlezen' => $vlezen, 'overzicht' => $overzicht]);
    }

    public function saveDish(Request $request, $overzicht)
    {
        $input = $request->all();

        $gerecht = new Gerecht();
        $gerecht->naam =$input['titel'];
        $gerecht->ingredienten =$input['ingredienten'];
        $gerecht->starch =$input['starch'];
        $gerecht->vlees =$input['vlees'];

        $gerecht->save();

        return redirect()->action('GerechtController@show', $overzicht);
    }

}
