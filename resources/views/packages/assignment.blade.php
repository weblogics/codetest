@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Assign Package</h1>


    <form method="POST" action="{{ route('package.assign') }}">
        @csrf

        <div class="card">
            <div class="card-body pb-1">

                @if($teams)
                    <h3 class="pb-2">Select a team</h3>
                    @if($errors->has('team_id'))
                        <div class="alert alert-danger">
                            <p class="mb-0">{{ $errors->first('team_id') }}</p>
                        </div>
                    @endif
                    <select class="form-control mb-4" name="team_id">
                        @foreach($teams as $team)
                            <option value="{{ $team->team_id}}">{{$team->team_name}}</option>
                        @endforeach
                    </select>
                @else
                    <p>You are currently selecting a new package for <strong>{{ $team->team_name }}</strong></p>
                    <input type="hidden" name="team_id" value="{{ $team->team_id }}" />
                @endif

                @if($packages)
                    <h3 class="pb-2">Select a package</h3>
                    @if($errors->has('package_id'))
                        <div class="alert alert-danger">
                            <p class="mb-0">{{ $errors->first('package_id') }}</p>
                        </div>
                    @endif
                    @foreach($packages as $package)
                        <div class="card mb-3">
                            <div class="card-header">

                                @if($package->sell_limit != $package->subscription_count)
                                <div class="form-check float-left">
                                    <input class="form-check-input" type="radio" name="package_id" id="package{{ $package->package_id }}" value="{{ $package->package_id }}">
                                    <label class="form-check-label" for="package{{ $package->package_id }}">
                                        {{ $package->name }}
                                    </label>
                                </div>
                                @else
                                    {{ $package->name }}
                                    <span class="badge badge-pill badge-danger">Sold Out</span>
                                @endif

                                <span class="float-right">&pound;{{ $package->price }}</span>

                            </div>
                            <div class="card-body">
                                {{ $package->description }}
                            </div>
                            <div class="card-footer text-muted">
                                <div class="row">
                                    <div class="col">
                                        <strong>Days</strong>: {{ $package->days }}
                                    </div>
                                    <div class="col">
                                        <strong>Credits</strong>: {{ $package->mr_credits }}
                                    </div>
                                    <div class="col">
                                        <strong>Type</strong>: {{ $package->desk_type }}
                                    </div>
                                    <div class="col">
                                        <strong>Notice Period</strong>: {{ $package->cancellation_period }} Month(s)
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="card-footer">
                <button type="submit" name="button" class="btn btn-primary">Assign package</button>
                <a href="{{ route('packages') }}" class="btn btn-secondary ml-4">Cancel</a>
            </div>
        </div>

    </form>


@endsection
