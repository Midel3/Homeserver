@foreach (\Homeserver\Gerecht::ALL_STARCHES as $starch)
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">{{$starch}}</div>
            <div class="panel-body">
                <div>
                    <table class="table table-hover" id="gerechtsTable">
                        <tr>
                            <th>Add</th>
                            <th>Naam</th>
                            <th>Soort</th>
                            <th>Vlees</th>
                        </tr>

                        @foreach (\Homeserver\Gerecht::all() as $gerecht)
                        @if ($gerecht->starch === $starch)
                            @include('gerechten.dishrow')
                        @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endforeach
