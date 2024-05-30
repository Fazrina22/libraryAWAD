@extends('layouts.app')
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
                    <th>Book Name</th>
                    <td>
                        <select name="book_id" id="book_select" onchange="selectBook()" required>
                            <option value="{{$record->book_id}}">{{$record->book->title}}</option>
                            <option value="0">Enter a valid Book ID</option>
                            @foreach($books as $book)
                                @if($book->id == $record->book_id)
                                    @continue
                                @endif
                                <option value="{{$book->id}}">{{$book->title}}</option>
                            @endforeach
                        </select>
                        <input type="text" id="book_input" value="{{$record->book->id}}" onchange="searchBook()">
                        <script>
                            book_input = document.getElementById('book_input');
                            book_select = document.getElementById('book_select');

                            function searchBook() {
                                if (book_input.value !== "") {
                                    book_select.setAttribute('disabled', '');
                                    book_select.value = book_input.value;
                                }
                                if (book_select.value === "" || book_input.value === 0|| book_input.value === "") {
                                    book_select.removeAttribute('disabled');
                                    book_select.value = 0;
                                }
                            }
                            function selectBook(){
                                if(book_select.value !== 0){
                                    book_input.value = book_select.value;
                                    book_input.setAttribute('disabled', '');
                                }
                                if(book_select.value == 0){
                                    book_input.removeAttribute('disabled');
                                }
                            }
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>Member Name</th>
                    <td>
                        <select name="member_id" id="member_select" onchange="selectMember()" required>
                            <option value="{{$record->member_id}}">{{$record->member->name}}</option>
                            <option value="0">Enter a valid Member ID</option>
                            @foreach($members as $member)
                                @if($member->id == $record->member_id)
                                    @continue
                                @endif
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
                        <input type="text" value="{{$record->member->id}}" id="member_input" onchange="searchMember()">
                        <script>
                            member_input = document.getElementById('member_input');
                            member_select = document.getElementById('member_select');

                            function searchMember() {
                                if (member_input.value !== "") {
                                    member_select.setAttribute('disabled', '');
                                    member_select.value = member_input.value;
                                    if (member_select === "" || member_input === ""){
                                        member_select.removeAttribute('disabled');
                                        member_select.value=0;
                                    }
                                }
                            }

                            function selectMember(){
                                if(member_select.value !== 0){
                                    member_input.value = member_select.value;
                                    member_input.setAttribute('disabled', '');
                                }
                                if(member_select.value == 0){
                                    member_input.removeAttribute('disabled');
                                }
                            }
                        </script>
                    </td>
                </tr>
                <tr>
                    <th>Borrowing Date</th>
                    <td><input type="date" name="borrowed_date" value="{{$record->borrowed_date}}"></td>
                </tr>
                <tr>
                    <th>Returning Date</th>
                    <td><input type="date" name="returned_date" value="{{$record->returned_date}}"></td>
                </tr>
            </table>
            <input class="btn btn-outline-warning" type="submit" value="Update Borrowing Record">
        </form>
    </div>
@endsection
