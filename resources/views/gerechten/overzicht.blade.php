@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach ($vlezen as $vlees)
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$vlees->soort}}</div>
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
                            @if ($gerecht->vlees === $vlees->soort)
                            <tr>
                                <td>{{$gerecht->naam}}</td>
                                <td>{{$gerecht->omschrijving}}</td>
                                <td>{{$gerecht->type}}</td>
                                <td>{{$gerecht->vlees}}</td>
                            </tr>
                            @endif
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
