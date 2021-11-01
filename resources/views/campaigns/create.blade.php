@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <h2>Add a campaign</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ url('/campaigns') }}">
                    @csrf
                    <div class="form-group">
                        <label for="group_id">Select group:</label>
                        <select class="form-control" id="group_id" name="group_id">
                            @foreach($groups as $group)
                                <option value="{{$group['id']}}">{{$group['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="template_id">Select template:</label>
                        <select class="form-control" id="template_id" name="template_id">
                            @foreach($templates as $template)
                                <option value="{{$template['id']}}">{{$template['title']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="send_date">Send date</label>
                        <input placeholder="Select date" id="send_date" name="send_date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="send_time">Send time</label>
                        <div class="md-form md-outline input-with-post-icon">
                            <input placeholder="For example: 15:00" id="send_time" name="send_time" class="form-control">
                        </div>
                    </div>
                    <a class="btn btn-secondary" href="{{ url('/campaigns') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
