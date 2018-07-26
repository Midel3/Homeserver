
@foreach ($starches as $starch)
    <div class="panel panel-default">
        <div class="panel-heading">{{$starch->soort}}</div>
        <div class="panel-body">
            <div>
                <table class="table table-hover">
                    <tr>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                        <th>Soort</th>
                        <th>Vlees</th>
                    </tr>

                    @foreach ($gerechtsByVlees as $gerecht)
                    @if ($gerecht->starch === $starch->soort)
                    <tr>
                        <td>{{$gerecht->naam}}</td>
                        <td>{{$gerecht->omschrijving}}</td>
                        <td>{{$gerecht->starch}}</td>
                        <td>{{$gerecht->vlees}}</td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endforeach
