<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Record;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function keyword(){
        return view('search.keyword');
    }

    public function search(Request $request){
        if($request['search'] === 'Search by Book ID'){
            $record = Record::where('book_id', $request['keyword'])->where('returned_date', null)->get();
        }
        else{
            $member = Member::firstWhere('ic', $request['keyword']);
            $record = Record::where('member_id', $member->id)->where('returned_date', null)->get();
        }

        return view('search.detail', ['records' => $record]);
    }
}
