@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>List of Members</h1>
        <a class="btn btn-dark my-2" href="{{route('member.create')}}">Add New Library Member</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IC</th>
                <th>Address</th>
                <th>Contact</th>
                <th class="text-center">Action</th>
            </tr>

            @foreach ($members as $member)
                <tr>
                    <td>{{$member->id}}</td>
                    <td>{{$member->name}}</td>
                    <td>{{$member->ic}}</td>
                    <td>{{$member->address}}</td>
                    <td>{{$member->contact}}</td>
                    <td class="text-center">
                        <form action="{{route('member.destroy', $member)}}" method="post">
                            <a class="btn btn-primary" href="{{route('member.show', $member)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('member.edit', $member)}}">Edit</a>
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
