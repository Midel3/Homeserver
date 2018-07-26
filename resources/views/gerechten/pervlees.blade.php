@extends('layouts.gerecht')

@section('overzicht')

@foreach ($vlezen as $vlees)
    <div class="panel panel-default">
        <div class="panel-heading">{{$vlees->soort}}</div>
        <div class="panel-body">
            <div>
                <table class="table table-hover">
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
@endsection
