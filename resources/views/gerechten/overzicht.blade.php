@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Gerechten</div>

                <div class="panel-body">
                    <div>
                        <table>
                            <tr>
                                <th>Naam</th>
                                <th>Omschrijving</th>
                                <th>Soort</th>
                                <th>Vlees</th>
                            </tr>

                            @foreach ($gerechts as $gerecht)
                            <tr>
                                <td>{{$gerecht->naam}}</td>
                                <td>{{$gerecht->omschrijving}}</td>
                                <td>{{$gerecht->type}}</td>
                                <td>{{$gerecht->vlees}}</td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
