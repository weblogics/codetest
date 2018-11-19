@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Packages</h1>

    <div class="card">
        <div class="card-body p-0">
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Desk Type</th>
                    <th>Price</th>
                    <th>Credits</th>
                    <th>Available *</th>
                    <th>&nbsp;</th>
                </thead>
                <tbody>
                @if($packages)
                    @foreach($packages as $package)
                        @include('packages.shared.package_item')
                    @endforeach
                @else
                    <tr>
                        <td colspan="6">There are currently no teams to view.</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>

    <p class="text-muted mt-3">* Availability is based on active packages, totals do not include expired packages</p>
@endsection
