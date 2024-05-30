@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Create New Member</h1>
        <form method="post" action="{{route('member.store')}}">
            @csrf
            @method('post')
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>IC</th>
                    <td><input type="text" name="ic"></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input type="text" name="address"></td>
                </tr>
                <tr>
                    <th>Contact</th>
                    <td><input type="text" name="contact"></td>
                </tr>
            </table>
            <input class="btn btn-outline-dark" type="submit" value="Add New Member">
        </form>
    </div>
@endsection
