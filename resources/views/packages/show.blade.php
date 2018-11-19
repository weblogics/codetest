@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12">
            <h1 class="mb-4 float-left"><i class="fas fa-box"></i>&nbsp; {{ $package->name }}</h1>
            <a href="{{ route('packages') }}" class="btn btn-primary float-right"><i class="fas fa-chevron-left"></i> Back to packages</a>
        </div>

        <div class="col-12">

            <div class="card">
                <div class="card-header border-bottom-0">
                    <h4 class="float-left card-title mb-0">Team Packages</h4>
                    <a href="{{ route('package.assignment', ['team' => $package->team_id]) }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-plus"></i> Assign New Package</a>
                </div>
                <div class="card-body p-0">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Team Name</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($package->teamPackages) > 0)
                            @foreach($package->teamPackages as $team_package)
                            <tr>
                                <td>{{ $team_package->team_name }}</td>
                                <td>{{ $team_package->pivot->start_date->format('d/m/Y') }}</td>
                                <td>
                                    {{ is_null($team_package->pivot->end_date) ? '-' : $team_package->pivot->end_date->format('d/m/Y') }}
                                </td>
                                <td>
                                    @if($team_package->pivot->expired)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Expired</span>
                                    @endif
                                </td>
                                <td>
                                    @if($team_package->pivot->canCancelPackage)
                                    <a href="{{ route('package.terminate_check', ['package' => $team_package->pivot->team_package_id]) }}" class="btn btn-sm btn-danger"><i class="fa fa-times"></i> Give Notice</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">There are no teams currently assigned to this package.</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
