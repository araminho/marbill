@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                </tr>
                </thead>
                <tbody>
                    @forelse ($customers as $key => $customer)
                        <tr>
                            <th scope="row">{{$customer['id']}}</th>
                            <td>{{$customer['first_name']}}</td>
                            <td>{{$customer['last_name']}}</td>
                            <td>{{$customer['email']}}</td>
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
