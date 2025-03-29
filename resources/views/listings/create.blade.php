@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create listing</div>

                <div class="card-body">
                 <form action="{{ route('listings.store', [$area]) }}" method="post">
                    
                    <div class="form-group">
                        <label for="title" class="control-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title" class="control-label">Body</label>
                        <textarea class="form-control" name="body" id="body" cols="30" rows="8"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary w-100">Save</button>
                    </div>

                 </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
