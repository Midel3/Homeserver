@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Dinner</h1>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div style="padding: 30px">
                <div class="row">
                    <div class="col-md-8">
                        <div class="btn-group">
                            <a href="{{action('GerechtController@pervlees')}}" class="btn btn-default">
                                Soorteer op vlees
                            </a>
                            <a href="{{action('GerechtController@perstarch')}}" class="btn btn-default">
                                Soorteer op soort
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#newDishModal">
                            Nieuw gerecht
                        </button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        &nbsp;
                    </div>
                </div>
                <div class="row">
                    @include($overzicht)
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div style="padding: 30px">
                <h2>Week</h2>
            </div>
        </div>
    </div>

    <!-- modal add new dish -->
    <div class="modal" id="newDishModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Voeg nieuw gerecht toe</h2>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="titel">Titel</label>
                            <input type="text" id="titel" name="titel" class="form-control" required="required"></input>
                        </div>
                        <div class="form-group">
                            <label for="ingredienten">Ingrediënten</label>
                            <textarea rows="5" cols="50" id="ingredienten" name="ingredienten" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="starch">Soort</label>
                            <select id="starch" name="starch" class="form-control">
                                @foreach ($starches as $starch)
                                <option value="{{$starch->soort}}">{{$starch->soort}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vlees">Vlees</label>
                            <select id="vlees" name="vlees" class="form-control">
                                @foreach ($vlezen as $vlees)
                                <option value="{{$vlees->soort}}">{{$vlees->soort}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
