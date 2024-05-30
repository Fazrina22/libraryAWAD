@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Add New Volunteer</h1>
        <form method="post" action="{{route('user.store')}}">
            @csrf
            @method('post')
            <table class="table">
                <tr>
                    <th>Name</th>
                    <td><input type="text" name="name"></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input type="email" name="email"></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>
                        <select name="role">
                            <option value="Volunteer">Volunteer</option>
                            <option value="Supervisor">Supervisor</option>
                        </select>
                    </td>
                </tr>
            </table>
            <input class="btn btn-outline-dark" type="submit" value="Add New Volunteer">
        </form>
    </div>
@endsection
