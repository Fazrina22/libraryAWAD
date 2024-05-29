@extends('layouts.app')

@section('content')
    <div class="container">
    <form action="{{route('search.record')}}" method="get">
        @csrf
        @method('get')
        <input type="text" name="keyword" id="keyword">
        <input type="submit" name="search" value="Search by Book ID">
        <input type="submit" name="search" value="Search by Member IC">
    </form>
    </div>
@endsection
