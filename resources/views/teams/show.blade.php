@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12">
            <h1 class="mb-4 float-left"><i class="fas fa-users"></i>&nbsp; {{ $team->team_name }}</h1>
            <a href="{{ route('teams') }}" class="btn btn-primary float-right"><i class="fas fa-chevron-left"></i> Back to teams</a>
        </div>

        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h4 class="float-left card-title mb-0">Packages</h4>
                    <a href="{{ route('package.assignment', ['team' => $team->team_id]) }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-plus"></i> Assign New Package</a>
                </div>
                <div class="card-body pt-1">
                    @if($currentPackages)
                        @include('teams.shared.team_packages', ['heading' => 'Current Packages', 'packages' => $currentPackages])
                    @endif
                    @if($expiredPackages)
                        @include('teams.shared.team_packages', ['heading' => 'Expired Packages', 'packages' => $expiredPackages])
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection
