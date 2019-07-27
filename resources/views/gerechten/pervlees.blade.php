@foreach (\Homeserver\Gerecht::ALL_MEATS as $vlees)
    <div class="panel panel-default">
        <div class="panel-heading">{{$vlees}}</div>
        <div class="panel-body">
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>Naam</th>
                        <th>Ingrediënten</th>
                        <th>Soort</th>
                        <th>Vlees</th>
                    </tr>

                    @foreach (\Homeserver\Gerecht::all() as $gerecht)
                    @if ($gerecht->vlees === $vlees)
                    <tr>
                        <td>{{$gerecht->naam}}</td>
                        <td>{{$gerecht->ingredienten}}</td>
                        <td>{{$gerecht->starch}}</td>
                        <td>{{$gerecht->vlees}}</td>
                        <td>
                            <button type="button" id="edit-modal-btn" class= "btn btn-warning pull-right" data-dish="{{$gerecht}}">
                                Edit
                            </button>
                        </td>
                        <td>
                            <form action="{{action('GerechtController@deleteDish', $gerecht)}}" method="post">
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger pull-right" onclick="return confirm('Wil je dit gerecht verwijderen?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endforeach
