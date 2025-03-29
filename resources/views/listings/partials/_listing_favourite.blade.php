@component('listings.partials._base_listings', compact('listing'))
@slot('links')
<ul class="list-inline">
    <li class="list-inline-item"> Added {{ $listing->pivot->created_at->diffForHumans() }} </li>
    <li class="list-inline-item"><a href="#" onclick="event.preventDefault(); document.getElementById('listing-favourites-destroy-{{ $listing->id }}').submit();">Delete</a></li>
</ul>

<form action="{{ route('listings.favourites.destroy', [$area, $listing]) }}" method="post" id="listing-favourites-destroy-{{ $listing->id }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
</form>
@endslot
@endcomponent