@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Update Record Details</h1>
        <form action="{{route('record.update', $record)}}" method="post">
            @csrf
            @method('put')
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{$record->id}}</td>
                </tr>
                <tr>
                    <th>Book ID</th>
                    <td>
                        <input list="dataListBooks" name="book_id" class="form-control" id="book_input" value="{{$record->book->id}}" onchange="searchBook()">
                        <datalist id="dataListBooks" >
                            <option value="{{$record->book_id}}" selected>{{$record->book->title}}</option>
                            @foreach($books as $book)
                                @if($book->id == $record->book_id)
                                    @continue
                                @endif
                                <option value="{{$book->id}}">{{$book->title}}</option>
                            @endforeach
                        </datalist>
                    </td>
                </tr>
                <tr>
                    <th>Member ID</th>
                    <td>
                        <input class="form-control" list="dataListMembers" name="member_id" value="{{$record->member->id}}" id="member_input" required>
                        <datalist  id="dataListMembers">
                            <option value="{{$record->member_id}}" selected>{{$record->member->name}}</option>
                            @foreach($members as $member)
                                @if($member->id == $record->member_id)
                                    @continue
                                @endif
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </datalist>

                    </td>
                </tr>
                <tr>
                    <th>Borrowing Date</th>
                    <td><input type="date" name="borrowed_date" value="{{$record->borrowed_date}}"></td>
                </tr>
                <tr>
                    <th>Returning Date</th>
                    <td><input type="date" name="returned_date" min="{{$record->borrowed_date}}" value="{{$record->returned_date}}"></td>
                </tr>
            </table>
            <input class="btn btn-outline-warning" type="submit" value="Update Borrowing Record">
        </form>
    </div>
@endsection
