@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a href="{{action('GerechtController@pervlees')}}">Gerechten per vlees</a>
                    <br>
                    <a href="{{action('GerechtController@perstarch')}}">Gerechten per starch</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
