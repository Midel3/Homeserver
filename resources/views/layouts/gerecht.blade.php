@extends('layouts.app')

@section('content')
<div class="text-center">
    <h1>Dinner</h1>
</div>
<div class="row">
    <div class="col-md-5 col-md-offset-1">
        <div class="row">
            <div class="col-centered">
                <div class="btn-group">
                    <a href="{{action('GerechtController@pervlees')}}" class="btn btn-default">
                        Soorteer op vlees
                    </a>
                    <a href="{{action('GerechtController@perstarch')}}" class="btn btn-default">
                        Soorteer op soort
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                &nbsp;
            </div>
        </div>
        <div class="row">
            @yield('overzicht')
        </div>
    </div>
</div>
@endsection
