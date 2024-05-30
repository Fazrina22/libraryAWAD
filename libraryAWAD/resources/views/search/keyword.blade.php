@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('search.record')}}" method="get">
            @csrf
            @method('get')
            <input class="form-control form-control-md" placeholder="Write Book ID or Member Identification Number here..." type="text" name="keyword" id="keyword">
            <div class="flex justify-content-end my-3">
                <input class="btn btn-dark" type="submit" name="search" value="Search by Book ID">
                <input class="btn btn-secondary" type="submit" name="search" value="Search by Member IC">
            </div>
        </form>
    </div>
@endsection
