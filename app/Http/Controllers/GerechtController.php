<?php

namespace Homeserver\Http\Controllers;

use Homeserver\Gerecht;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class GerechtController extends Controller {

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

        return view('gerechten.main',
            [
                'overzicht' => $overzicht
            ]);
    }

    public function saveDish(Request $request, $overzicht)
    {
        $input = $request->all();

        $gerecht = new Gerecht;
        $gerecht->naam =$input['titel'];
        $gerecht->ingredienten =$input['ingredienten'];
        $gerecht->starch =$input['starch'];
        $gerecht->vlees =$input['vlees'];

        $gerecht->save();

        return redirect()->action('GerechtController@show', $overzicht);
    }

    public function editDish(Request $request, $overzicht) {
        $input = $request->all();

        $gerecht = Gerecht::where('id', $input['id']);

        $values = [
            'ingredienten' => $input['ingredienten'],
            'starch' => $input['starch'],
            'vlees' => $input['vlees'],
        ];


        $gerecht->update($values);

        return redirect()->action('GerechtController@show', $overzicht);
    }

    public function deleteDish(Request $request, $gerecht) {
        $dish = Gerecht::where('id', $gerecht);
        $dish->delete();
        return redirect()->back();
    }

}
