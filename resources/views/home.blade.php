@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-body p-4">
            <div class="row g-4">
                @foreach ($areas as $country)
                    <div class="col-md-12 mb-4">
                        <h3 class="text-primary mb-3 fw-bold"><a href="{{ route('user.area.store', $country) }}">{{ $country->name }}</a></h3>
                        <hr>
                        <div class="row g-3">
                            @foreach ($country->children as $state)
                                <div class="col-md-4">
                                    <div class="card h-100 border-light">
                                        <div class="card-body">
                                            <h4 class="text-secondary mb-3 fw-semibold"><a href="{{ route('user.area.store', $state) }}">{{ $state->name }}</a></h4>
                                            <hr>
                                            <div class="list-group list-group-flush">
                                                @foreach ($state->children as $city)
                                                    <h5 class="list-group-item border-0 py-1"><a href="{{ route('user.area.store', $city) }}">{{ $city->name }}</a></h5>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
</div>


@endsection
