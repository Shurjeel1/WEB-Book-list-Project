<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = DB::table('books')->paginate(10); // Replace 'books' with your actual table name

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'coverpage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = '';
        if ($request->hasFile('coverpage')) {
            $imageName = time() . '.' . $request->file('coverpage')->extension();
            $request->file('coverpage')->move(public_path('uploads'), $imageName);
        }

        $book = new Book;
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->coverpage = $imageName;
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
        ]);

        $imageName = '';
        if ($request->hasFile('coverpage')) {
            $imageName = time() . '.' . $request->file('coverpage')->extension();
            $request->file('coverpage')->move(public_path('uploads'), $imageName);
            $book->coverpage = $imageName;
        }

        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->type = $request->input('type');
        $book->save();

        return redirect()->route('books.index')->with('success', 'Book has been updated successfully.');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book has been deleted successfully.');
    }
}
