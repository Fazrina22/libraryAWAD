@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Records</h1>
        <a href="{{route('record.create')}}">Add New Record</a>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Member Name</th>
                <th>Borrowing Date</th>
                <th>Returning Date</th>
                <th>Action</th>
            </tr>

            @foreach ($records as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->book->name}}</td>
                    <td>{{$record->member->name}}</td>
                    <td>{{$record->borrowed_date}}</td>
                    <td>{{$record->returned_date}}</td>
                    <td>
                        <a href="{{route('record.show', $record)}}">Show</a>
                        <a href="{{route('record.edit', $record)}}">Edit</a>
                        <form action="{{route('record.destroy', $record)}}" method="post">
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
