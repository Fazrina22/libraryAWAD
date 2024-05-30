@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Member Details</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{$member->id}}</td>
            </tr>
            <tr>
                <th>Name</th>
                <td>{{$member->name}}</td>
            </tr>
            <tr>
                <th>Identity Card Number</th>
                <td>{{$member->ic}}</td>
            </tr>
            <tr>
                <th>Address</th>
                <td>{{$member->address}}</td>
            </tr>
            <tr>
                <th>Contact</th>
                <td>{{$member->contact}}</td>
            </tr>
        </table>
        <div class="my-5">
            <h2>Borrowing History</h2>
            <table class="table table-striped">
                <tr>
                    <th>Book Name</th>
                    <th>Borrowing Date</th>
                    <th>Returning Date</th>
                    <th class="text-center">Status</th>
                </tr>
                @foreach($member->records as $record)
                    <tr>
                        <td>{{$record->book->title}}</td>
                        <td>{{$record->borrowed_date}}</td>
                        <td>{{$record->returned_date}}</td>
                        @if($record->returned_date !== null)
                            <td class="table-success text-center">
                                Returned
                            </td>
                        @else
                            <td class="table-danger text-center">
                                Pending
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
