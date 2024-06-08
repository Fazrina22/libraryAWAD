@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Add New Record</h1>
        <form method="post" action="{{route('record.store')}}">
            @csrf
            @method('post')
            <table class="table">
                <tr>
                    <th>Book ID</th>
                    <td>
                        <div class="form-group">
                            <input class="form-control" name="book_id" id="book_input" list="dataListBooks" placeholder="Type Book ID or Book Name to search..." required>
                            <datalist id="dataListBooks">
                                @foreach($books as $book)
                                    <option value="{{$book->id}}">{{$book->title}}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Member ID</th>
                    <td>
                        <div class="form-group">

                            <input list="dataListMembers" name="member_id" class="form-control" id="member_input" placeholder="Type Member ID or Member Name to search..." required>
                            <datalist id="dataListMembers">
                                @foreach($members as $member)
                                    <option value="{{$member->id}}">{{$member->name}}</option>
                                @endforeach
                            </datalist>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Borrowing Date</th>
                    <td>
                        <div class="form-group">
                            <input class="form-control" type="date" min="{{date('Y-m-d')}}" name="borrowed_date">
                        </div>
                    </td>
                </tr>
            </table>
            <input class="btn btn-outline-dark" type="submit" value="Add New Record">
        </form>
    </div>
@endsection
