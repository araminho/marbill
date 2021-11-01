@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <div class="row justify-content-center">
                <h2>Customers</h2>
            </div>
        </div>
        <div class="col-md-2">
            <a href="{{ url('/customers/create') }}" class="btn btn-primary">Add new</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Groups</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $customer)
                        <tr>
                            <th scope="row">{{$customer['id']}}</th>
                            <td>{{$customer['first_name']}}</td>
                            <td>{{$customer['last_name']}}</td>
                            <td>{{$customer['email']}}</td>
                            <td>
                                @foreach($customer->groups as $group)
                                    {{$group->title}}

                                @endforeach
                            </td>
                        </tr>
                    @empty
                        <tr class="no-data">
                            <td colspan="4">No data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{$customers->links()}}

        </div>
    </div>
</div>
@endsection
