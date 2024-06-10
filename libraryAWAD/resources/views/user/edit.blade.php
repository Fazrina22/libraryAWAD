@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Edit User Details</h1>
        <form method="post" action="{{route('user.update', $user)}}">
            @csrf
            @method('put')
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name" value="{{$user->name}}"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="text" name="email" value="{{$user->email}}"></td>
                </tr>
            </table>
            <input class="btn btn-outline-warning" type="submit" value="Update User">
        </form>
    </div>
@endsection

