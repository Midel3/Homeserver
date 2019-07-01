@foreach (\Homeserver\Gerecht::ALL_STARCHES as $starch)
    <div class="panel panel-default">
        <div class="panel-heading">{{$starch}}</div>
        <div class="panel-body">
            <div>
                <table class="table table-hover" id="gerechtsTable">
                    <tr>
                        <th>Naam</th>
                        <th>Ingrediënten</th>
                        <th>Soort</th>
                        <th>Vlees</th>
                    </tr>

                    @foreach (\Homeserver\Gerecht::all() as $gerecht)
                    @if ($gerecht->starch === $starch)
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
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endforeach
