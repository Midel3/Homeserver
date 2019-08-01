@foreach (\Homeserver\Gerecht::ALL_MEATS as $vlees)
    <div class="panel panel-default">
        <div class="panel-heading">{{$vlees}}</div>
        <div class="panel-body">
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>Add</th>
                        <th>Naam</th>
                        <th>Ingrediënten</th>
                        <th>Soort</th>
                        <th>Vlees</th>
                        <th>Edit</th>
                        <th>Del</th>
                    </tr>

                    @foreach (\Homeserver\Gerecht::all() as $gerecht)
                    @if ($gerecht->vlees === $vlees)
                        @include('gerechten.dishrow')
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endforeach
