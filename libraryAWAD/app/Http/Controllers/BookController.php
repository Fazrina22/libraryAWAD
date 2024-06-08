<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
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
        $books = Book::all();

        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'title' => $request['title'],
            'author' => $request['author'],
            'publisherName' => $request['publisherName'],
            'publishedYear' => $request['publishedYear'],
            'category' => $request['category'],
            'status' => 'Available',
        ];

        Book::create($data);

        return redirect(route('book.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = [
          'title'=> $request['title'],
          'author'=> $request['author'],
          'publisherName'=> $request['publisherName'],
          'publishedYear'=> $request['publishedYear'],
          'category'=> $request['category'],
        ];

        $book->update($data);

        return redirect(route('book.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect(route('book.index'));
    }

    public function available()
    {
        $books = Book::where('status', 'Available')->get();

        return view('book.available', ['books' => $books]);
    }
}
