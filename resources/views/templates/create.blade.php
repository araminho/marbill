@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <h2>Add a template</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ url('/templates') }}">
                    @csrf
                    <div class="form-group">
                        <label for="groupTitle">Title *</label>
                        <input type="text" class="form-control" id="groupTitle"
                               name="title" placeholder="Enter title" required>
                    </div>
                    <div class="form-group">
                        <label for="groupTitle">Subject *</label>
                        <input type="text" class="form-control" id="subject"
                               name="subject" placeholder="Enter subject" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea class="form-control" rows="5" id="content"
                                  name="content" aria-describedby="contentHelp"></textarea>
                        <small id="contentHelp" class="form-text text-muted">
                            Available placeholders - {first_name}, {last_name}.
                        </small>
                    </div>
                    <a class="btn btn-secondary" href="{{ url('/templates') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
