@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add New Record</h1>
        <form method="post" action="{{route('record.store')}}">
            @csrf
            @method('post')
            <table class="table">
                <tr>
                    <th>Book ID</th>
                    <td><input type="text" name="book_id"></td>
                </tr>
                <tr>
                    <th>Member ID</th>
                    <td><input type="text" name="member_id"></td>
                </tr>
                <tr>
                    <th>Borrowing Date</th>
                    <td><input type="date" name="borrowed_date"></td>
                </tr>
            </table>
            <input type="submit" value="Add New Record">
        </form>
    </div>
@endsection
