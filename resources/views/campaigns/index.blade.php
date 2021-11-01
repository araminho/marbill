@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <h2>Email Campaigns</h2>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/campaigns/create') }}" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Group</th>
                    <th scope="col">Template</th>
                    <th scope="col">Send date</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($campaigns as $campaign)
                        <tr>
                            <th scope="row">{{$campaign['id']}}</th>
                            <td>{{$campaign->group->title}}</td>
                            <td>{{$campaign->template->title}}</td>
                            <td>{{$campaign->send_date}}</td>
                            <td>
                                <a class="btn btn-success" target="_blank"
                                   href="{{ url("/campaigns/send/{$campaign['id']}") }}">
                                    Send now
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr class="no-data">
                            <td colspan="5">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
