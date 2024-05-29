@extends('layouts.app')

@section('content')
    <div class="container">
        @if(!isset($records))
            <h2>No record found</h2>
        @endif
        @foreach($records as $record)
            <table class="table table-striped">
                <tr>
                    <th>Book Title</th>
                    <td>{{$record->book->title}}</td>
                </tr>
                <tr>
                    <th>Borrower Name</th>
                    <td>{{$record->member->name}}</td>
                </tr>
                <tr>
                    <th>Book Title</th>
                    <td>{{$record->borrowed_date}}</td>
                </tr>
            </table>
            <form action="{{route('record.return', $record)}}" method="post">
                @csrf
                @method('put')
                <input type="submit" value="Return Book">
            </form>
        @endforeach
    </div>
@endsection
