
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group">
                            <input type="hidden" id="currentWeek" name="currentWeek" value={{date("W")}}>
                            <select id="weekToShow" name="weekToShow" class="form-control">
                                @for ($i = 1; $i <= 53; $i++)
                                    <option value="{{$i}}">week {{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        &nbsp;
                    </div>
                </div>
                <div class="row">

                </div>
            </div>
        </div>
    </div>
</div>

    <!-- modal add new dish -->
<div class="container">
    <div class="modal" id="newDishModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{action('GerechtController@saveDish', $overzicht)}}">
                    {{ csrf_field() }}
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title">Nieuw gerecht</h2>

                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="titel">Titel</label>
                            <input type="text" id="titel" name="titel" class="form-control" required="required"></input>
                        </div>
                        <div class="form-group">
                            <label for="ingredienten">Ingrediënten</label>
                            <textarea rows="5" cols="50" id="ingredienten" name="ingredienten" class="form-control" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="starch">Soort</label>
                            <select id="starch" name="starch" class="form-control">
                                @foreach (\Homeserver\Gerecht::ALL_STARCHES as $starch)
                                <option value="{{$starch}}">{{$starch}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="vlees">Vlees</label>
                            <select id="vlees" name="vlees" class="form-control">
                                @foreach (\Homeserver\Gerecht::ALL_MEATS as $meat)
                                <option value="{{$meat}}">{{$meat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal" id="editDishModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{action('GerechtController@editDish', $overzicht)}}">
                    {{ csrf_field() }}

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h2 class="modal-title" id="edit-modal-title"></h2>

                    </div>
                    <input type="hidden" id="edit-id" name="id">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="edit-ingredienten">Ingrediënten</label>
                            <textarea rows="5" cols="50" id="edit-ingredienten" name="ingredienten" class="form-control" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-starch">Soort</label>
                            <select id="edit-starch" name="starch" class="form-control">
                                @foreach (\Homeserver\Gerecht::ALL_STARCHES as $starch)
                                    <option value="{{$starch}}">{{$starch}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="edit-vlees">Vlees</label>
                            <select id="edit-vlees" name="vlees" class="form-control">
                                @foreach (\Homeserver\Gerecht::ALL_MEATS as $meat)
                                    <option value="{{$meat}}">{{$meat}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">
                            Update
                        </button>
                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluit</button> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal" id="addWeekDinnerModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="add-dinner-title"></h2>

                </div>
                <input type="hidden" id="week-dish-id" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="year">Jaar</label>
                        <select id="week-year" name="year" class="form-control">
                            @foreach (\Homeserver\WeekDinner::ALL_YEARS as $year)
                                <option value="{{$year}}">{{$year}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="week">Week</label>
                        <select id="week-week" name="week" class="form-control">
                            @for ($i = (int) date("W"); $i <= 53; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="day">Dag</label>
                        <select id="week-day" name="day" class="form-control">
                            @foreach (\Homeserver\WeekDinner::DAYS_OF_WEEK as $day)
                                <option value="{{$day}}">{{$day}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="store-week-dinner-btn" class="btn btn-primary">
                        <i class="fa fa-plus"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
