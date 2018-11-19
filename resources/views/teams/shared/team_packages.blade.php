<div class="card mt-3">
    <div class="card-header border-bottom-0">
        {{ $heading }}
        @isset($teamId)
        <a href="{{ route('package.assignment') }}" class="btn btn-secondary btn-sm float-right"><i class="fas fa-plus"></i> Assign New Package</a>
        @endisset
    </div>
    <div class="card-body p-0">
        <table class="table mb-0">
            <tbody>
            @if(count($packages) > 0)
                <thead>
                    <th>Package Name</th>
                    <th>Cost</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>&nbsp;</th>
                </thead>
                @foreach($packages as $package)
                <tr>
                    <td>{{ $package->name }}</td>
                    <td>&pound;{{ $package->price }}</td>
                    <td>{{ $package->pivot->start_date->format('d/m/Y') }}</td>
                    <td>{{ is_null($package->pivot->end_date) ? '-' : $package->pivot->end_date->format('d/m/Y') }}</td>
                    <td>&nbsp;</td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">
                        There are no {{ $heading }} to show.
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
</div>
