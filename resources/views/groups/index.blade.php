@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <h2>Customer groups</h2>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/customer-groups/create') }}" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($customersGroups as $group)
                        <tr>
                            <th scope="row">{{$group['id']}}</th>
                            <td>{{$group['title']}}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url("/customer-groups/{$group['id']}") }}">Edit</a>
                                <a class="btn btn-danger"
                                   href="{{ url("/customer-groups/{$group['id']}/delete") }}"
                                   onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
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
