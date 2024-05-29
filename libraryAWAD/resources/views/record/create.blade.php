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
                    <td>
                        <input type="text" id="book_input" onchange="searchBook()">
                        <select name="book_id" id="book_select" onchange="selectBook()" required>
                            <option value="0">Enter a valid Book ID</option>
                            @foreach($books as $book)
                                <option value="{{$book->id}}">{{$book->title}}</option>
                            @endforeach
                        </select>
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
                    <th>Member ID</th>
                    <td>
                        <input type="text" id="member_input" onchange="searchMember()">
                        <select name="member_id" id="member_select" onchange="selectMember()" required>
                            <option value="0">Enter a valid Member ID</option>
                            @foreach($members as $member)
                                <option value="{{$member->id}}">{{$member->name}}</option>
                            @endforeach
                        </select>
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
                    <td><input type="date" name="borrowed_date"></td>
                </tr>
            </table>
            <input type="submit" value="Add New Record">
        </form>
    </div>
@endsection
