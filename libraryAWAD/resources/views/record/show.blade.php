@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Record Details</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{$record->id}}</td>
            </tr>
            <tr>
                <th>Book Name</th>
                <td>{{$record->book->title}}</td>
            </tr>
            <tr>
                <th>Member Name</th>
                <td>{{$record->member->name}}</td>
            </tr>
            <tr>
                <th>Borrowing Date</th>
                <td>{{$record->borrowed_date}}</td>
            </tr>
            <tr>
                <th>Returning Date</th>
                <td>{{$record->returned_date}}</td>
            </tr>
        </table>
    </div>
@endsection
