@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Update Book Details</h1>
        <form method="post" action="{{route('book.update', $book)}}">
            @csrf
            @method('put')
            <table class="table table-striped">
                <tr>
                    <th>ID</th>
                    <td>{{$book->id}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title" value="{{$book->title}}"></td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td><input type="text" name="author" value="{{$book->author}}"></td>
                </tr>
                <tr>
                    <th>Publisher Name</th>
                    <td><input type="text" name="publisherName" value="{{$book->publisherName}}"></td>
                </tr>
                <tr>
                    <th>Published Year</th>
                    <td><input type="text" name="publishedYear" value="{{$book->publishedYear}}"></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category">
                            <option>{{$book->category}}</option>
                            <option>Romance</option>
                            <option>Horror</option>
                            <option>Thriller</option>
                            <option>Fiction</option>
                            <option>Documentary</option>
                            <option>Non-Fiction</option>
                            <option>Journal</option>
                            <option>Encyclopedia</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input class="btn btn-outline-warning" type="submit" value="Update Book Record">
        </form>

    </div>
@endsection
