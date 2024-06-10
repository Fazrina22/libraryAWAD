@extends('layouts.admin')
@section('content')
    <div class="container">
        <a class="btn btn-dark my-2" href="{{route('user.create')}}">Add New User</a>
        <h1>List of Supervisors</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Action</th>
            </tr>

            @foreach ($users as $user)
                @if($user->role === "Volunteer")
                    @continue
                @endif
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td class="text-center">
                        <form action="{{route('user.destroy', $user)}}" method="post">
                            <a class="btn btn-primary" href="{{route('user.show', $user)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('user.edit', $user)}}">Edit</a>
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        <h1>List of Volunteers</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th class="text-center">Action</th>
            </tr>

            @foreach ($users as $user)
                @if($user->role === "Supervisor")
                    @continue
                @endif
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td class="text-center">
                        <form action="{{route('user.destroy', $user)}}" method="post">
                            <a class="btn btn-primary" href="{{route('user.show', $user)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('user.edit', $user)}}">Edit</a>
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
