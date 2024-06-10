@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>List of Books</h1>
        <a class="btn btn-dark my-2" href="{{route('book.create')}}">Add New Book</a>
        <a class="btn btn-outline-dark" href="{{route('book.available')}}">Show Available Books Only</a>
        <table class="table table-striped">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Publisher Name</th>
                <th>Published Year</th>
                <th>Category</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>

            @foreach ($books as $book)
                <tr>
                    <td>{{$book->id}}</td>
                    <td>{{$book->title}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->publisherName}}</td>
                    <td>{{$book->publishedYear}}</td>
                    <td>{{$book->category}}</td>
                    <td class="text-center">{{$book->status}}</td>
                    <td class="col-4 text-center">
                        <form action="{{route('book.destroy', $book)}}" method="post">
                            <a class="btn btn-primary" href="{{route('book.show', $book)}}">Show</a>
                            <a class="btn btn-warning" href="{{route('book.edit', $book)}}">Edit</a>
                            @csrf
                            @method('delete')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
