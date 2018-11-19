@extends('layouts.app')

@section('content')
    <div class="row">

        <div class="col-12">
            <h1 class="mb-4 float-left"><i class="fas fa-ban"></i>&nbsp; Give Notice</h1>
            <a href="{{ route('package.show', ['package' => $teamPackage->package_id]) }}" class="btn btn-primary float-right"><i class="fas fa-chevron-left"></i> Back to package</a>
        </div>

        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <p>Are you sure you want to give you notice for your <strong>{{ $teamPackage->package->name }}</strong> package?</p>
                    <form method="POST" action="{{ route('package.terminate_confirm', $teamPackage) }}">
                        @csrf
                        <button type="submit" name="button" class="btn btn-danger">Give notice</button>
                        <a href="{{ route('package.show', ['package' => $teamPackage->package_id]) }}" class="btn btn-secondary ml-4">Cancel</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
