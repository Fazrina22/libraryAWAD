@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>User Details</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{$user->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$user->name}}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{$user->email}}</td>
            </tr>
        </table>
    </div>
@endsection

