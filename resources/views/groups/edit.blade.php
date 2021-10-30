@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <h2>Edit a customer group</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ url("/customer-groups/{$group['id']}") }}">
                    @csrf
                    <input type="hidden" name="id" value="{{$group['id']}}">
                    <div class="form-group">
                        <label for="groupTitle">Title</label>
                        <input type="text" class="form-control" id="groupTitle"
                               name="title" placeholder="Enter title" required
                               value="{{$group['title']}}">
                    </div>
                    <a class="btn btn-secondary" href="{{ url('/customer-groups') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
