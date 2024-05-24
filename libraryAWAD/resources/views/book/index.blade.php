@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>List of Books</h1>
        <a href="{{route('book.create')}}">Add New Book</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher Name</th>
                <th>Published Year</th>
                <th>Category</th>
                <th>Status</th>
                <th>Action</th>
            </tr>

            @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->publisherName}}</td>
                    <td>{{$book->publishedYear}}</td>
                    <td>{{$book->category}}</td>
                    <td>{{$book->status}}</td>
                    <td>
                        <a href="{{route('book.show', $book)}}">Show</a>
                        <a href="{{route('book.edit', $book)}}">Edit</a>
                        <form action="{{route('book.destroy', $book)}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
