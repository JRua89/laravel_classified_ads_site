@extends('layouts.app')

@section('content')
<div class="container">
<h5>{{ ucfirst($pageName) }} listing</h5>
<hr>
    @if($listings->count())
    
    @each('listings.partials._listing_favourite', $listings ,'listing')
    
    {{ $listings->links() }}

    @else
    <p>No Favorite listings found.</p>
    @endif
</div>
@endsection