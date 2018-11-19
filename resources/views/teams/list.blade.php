@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Teams</h1>
    <div class="alert alert-primary" role="alert">
        Click on a team to view their profile.
    </div>

    @if($teams)
        <div class="list-group">
            @foreach($teams as $team)
                @include('teams.shared.team_item')
            @endforeach
        </div>
    @else
        <p>There are currently no teams to view.</p>
    @endif
@endsection
