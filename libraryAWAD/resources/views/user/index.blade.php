@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Users</h1>
        <a href="{{route('user.create')}}">Add New Volunteer</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>

            @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>
                        <a href="{{route('user.show', $user)}}">Show</a>
                        <a href="{{route('user.edit', $user)}}">Edit</a>
                        <form action="{{route('user.destroy', $user)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
