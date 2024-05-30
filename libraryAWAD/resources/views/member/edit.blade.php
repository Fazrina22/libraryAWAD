@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Update Member Details</h1>
        <form method="post" action="{{route('member.update', $member)}}">
            @csrf
            @method('put')
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{$member->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="{{$member->name}}"></td>
                </tr>
                <tr>
                    <th>Identity Card Number</th>
                    <td><input type="text" name="ic" value="{{$member->ic}}"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="address" value="{{$member->address}}"></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><input type="text" name="contact" value="{{$member->contact}}"></td>
                </tr>
            </table>
            <input class="btn btn-outline-warning" type="submit" value="Update Member Record">
        </form>
    </div>
@endsection
