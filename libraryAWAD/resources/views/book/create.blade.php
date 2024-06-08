@extends('layouts.admin')
@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        <form method="post" action="{{route('book.store')}}">
            @csrf
            @method('post')
            <table class="table">
                <tr>
                    <th>Title</th>
                    <td><input type="text" name="title"></td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td><input type="text" name="author"></td>
                </tr>
                <tr>
                    <th>Publisher Name</th>
                    <td><input type="text" name="publisherName"></td>
                </tr>
                <tr>
                    <th>Published Year</th>
                    <td><input type="text" name="publishedYear"></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>
                        <select name="category">
                            <option>Romance</option>
                            <option>Novel</option>
                            <option>Religion</option>
                            <option>Fantasy</option>
                            <option>Thriller</option>
                            <option>Fiction</option>
                            <option>Documentary</option>
                            <option>Non-Fiction</option>
                            <option>Academic</option>
                            <option>Children</option>
                            <option>General Readings</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input class="btn btn-outline-dark" type="submit" value="Add New Book">
        </form>
    </div>
@endsection
