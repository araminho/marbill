@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <h2>Email Templates</h2>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/templates/create') }}" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Subject</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($templates as $template)
                        <tr>
                            <th scope="row">{{$template['id']}}</th>
                            <td>{{$template['title']}}</td>
                            <td>{{$template['subject']}}</td>
                        </tr>
                    @empty
                        <tr class="no-data">
                            <td colspan="3">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
