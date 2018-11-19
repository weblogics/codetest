<tr>
    <td>
        {{ $package->name }}
        <small class="text-muted d-block">{{ $package->description }}</small>
    </td>
    <td>{{ $package->desk_type }}</td>
    <td>&pound;{{ $package->getPriceAttribute($package->price) }}</td>
    <td>{{ $package->mr_credits }}</td>
    <td>
        {{ $package->subscription_count }} /
        @if(is_null($package->sell_limit))
            Unlimited
        @else
            {{ $package->sell_limit  }}
        @endif
    </td>
    <td>
        <a href="{{ route('package.show', ['package' => $package->package_id]) }}" class="btn btn-sm btn-secondary"><i class="fa fa-eye"></i> View</a>
    </td>
</tr>
