@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Members</h1>
        <a href="{{route('member.create')}}">Add New Library Member</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IC</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>

            @foreach ($members as $member)
                <tr>
                    <td>{{$member->id}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->ic}}</td>
                    <td>{{$member->address}}</td>
                    <td>{{$member->contact}}</td>
                    <td>
                        <a href="{{route('member.show', $member)}}">Show</a>
                        <a href="{{route('member.edit', $member)}}">Edit</a>
                        <form action="{{route('member.destroy', $member)}}" method="post">
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
