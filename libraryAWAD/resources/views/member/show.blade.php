@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Member Details</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{$member->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$member->name}}</td>
            </tr>
            <tr>
                <th>Identity Card Number</th>
                <td>{{$member->ic}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$member->address}}</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>{{$member->contact}}</td>
            </tr>
        </table>
    </div>
@endsection
