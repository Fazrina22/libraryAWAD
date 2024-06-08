<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Member;
use App\Models\Record;
use Illuminate\Http\Request;

class RecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $records = Record::all();

        return view('record.index', compact('records'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $books = Book::where('status','Available')->get();
        $members = Member::all();

        return view('record.create', ['books' => $books, 'members' => $members]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'book_id' => $request['book_id'],
            'member_id' => $request['member_id'],
            'borrowed_date' => $request['borrowed_date'],
            'returned_date' => null
        ];

        $record = Record::create($data);

        $record->book->update([
            'status' => 'Borrowed'
        ]);

        return redirect(route('record.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Record $record)
    {
        return view('record.show', compact('record'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Record $record)
    {
        $books = Book::where('status','Available')->get();
        $members = Member::all();
        return view('record.edit', ['record' => $record, 'books' => $books, 'members' => $members]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Record $record)
    {
        $data = [
            'member_id' => $request['member_id'],
            'book_id' => $request['book_id'],
            'borrowed_date' => $request['borrowed_date'],
            'returned_date' => $request['returned_date'],
        ];

        $record->update($data);

        return redirect(route('record.index'));
    }

    public function return(Record $record){

        $record->update([
           'returned_date' => date('Y-m-d'),
        ]);

        $record->book->update([
            'status' => 'Available',
        ]);
        return redirect(route('record.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Record $record)
    {
        //
        $record->delete();

        return redirect(route('record.index'));
    }
}
