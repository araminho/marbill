@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row justify-content-center">
                    <h2>Add a customer</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ url('/customers') }}">
                    @csrf
                    <div class="form-group">
                        <label for="first_name">First name *</label>
                        <input type="text" class="form-control" id="first_name"
                               name="first_name" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last name *</label>
                        <input type="text" class="form-control" id="last_name"
                               name="last_name" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" class="form-control" id="email"
                               name="email" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Sex</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex" value="male">Male
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex" value="female">Female
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth date</label>
                        <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker">
                            <input placeholder="Select date" id="birth_date" name="birth_date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="first_name">Group(s)</label>
                        @foreach ($customersGroups as $group)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="{{$group['id']}}"
                                        name="group_ids[]">
                                    {{$group['title']}}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <a class="btn btn-secondary" href="{{ url('/') }}">Cancel</a>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>
@endsection
