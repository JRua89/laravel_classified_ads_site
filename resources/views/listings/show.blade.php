@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">
        @if(Auth::check())
        <div class="col-md-3">
            <div class="card card-default">
                <div class="card-body">
                    <nav class="nav-stacked">
                        <ul class="list-unstyled">
                            <li><a href="">Email to a friend</a></li>

                            @if (!$listing->favoritedBy(Auth::user()))

                            <li>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('listings-favourite-form').submit();">Add to favorites </a>

                                <form action="{{ route('listings.favourites.store', [$area, $listing]) }}" method="post" id="listings-favourite-form" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </li>

                            @endif
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        @endif
        <div class="{{ Auth::check() ? 'col-md-9' : 'col-md-12' }}">
            <div class="card card-default mb-3">
                <div class="card-header">
                    <h4> {{ $listing->title }} in <span class="text-muted">{{ $listing->area->name }}</span></h4>
                </div>
                <div class="card-body">
                    {!! nl2br(e($listing->body)) !!}
                    <hr>
                    <p>Viewed {{ $listing->views() }} times</p>
                </div>
            </div>

            <!-- contact form-->

            <div class="card card-default">
                <div class="card-header">
                    Contact {{ $listing->user->name }}
                </div>
                <div class="card-body">
                    @if(Auth::guest())
                    <p><a href="/register">Sign up</a> for an account or <a href="/login">Sign in</a> to contact listing owners.</p>
                    @else
                    <form action="{{ route('listings.contact.store', [$area, $listing]) }}" method="post">
                        <div class="form-group mb-3 ">
                            <label for="message" class="control-label">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10"  class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}"></textarea>

                            @if($errors->has('message'))
                                <span class="help-block">{{ $errors->first('message') }}</span> 
                            @endif
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary w-100 ">Send</button>
                            <small class="form-text text-muted">
                                This will email {{ $listing->user->name }} and they'll be able to reply directly to you by email.
                            </small>
                        </div>

                        {{ csrf_field() }}
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection