@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Book Details</h1>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <td>{{$book->id}}</td>
            </tr>
            <tr>
                <th>Title</th>
                <td>{{$book->title}}</td>
            </tr>
            <tr>
                <th>Author</th>
                <td>{{$book->author}}</td>
            </tr>
            <tr>
                <th>Publisher Name</th>
                <td>{{$book->publisherName}}</td>
            </tr>
            <tr>
                <th>Published Year</th>
                <td>{{$book->publishedYear}}</td>
            </tr>
            <tr>
                <th>Category</th>
                <td>{{$book->category}}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{$book->status}}</td>
            </tr>
        </table>
    </div>
@endsection
