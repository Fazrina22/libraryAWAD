@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Records</h1>
        <a class="btn btn-dark my-2" href="{{route('record.create')}}">Add New Record</a>

        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Member Name</th>
                <th>Borrowing Date</th>
                <th>Returning Date</th>
                <th class="text-center">Action</th>
                <th class="text-center">Return Book</th>
            </tr>

            @foreach ($records as $record)
                <tr>
                    <td>{{$record->id}}</td>
                    <td>{{$record->book->title}}</td>
                    <td>{{$record->member->name}}</td>
                    <td>{{$record->borrowed_date}}</td>
                    <td>{{$record->returned_date}}</td>
                    <td class="text-center">
                        <form action="{{route('record.destroy', $record)}}" method="post">
                            <a class="btn btn-primary" href="{{route('record.show', $record)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('record.edit', $record)}}">Edit</a>
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                    <td class="text-center">
                        @if($record->returned_date == null)
                        <form method="post" action="{{route('record.return', $record)}}">
                            @csrf
                            @method('put')
                            <input class="btn btn-secondary" type="submit" value="Return Book">
                        </form>
                        @else
                            Returned
                        @endif
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
