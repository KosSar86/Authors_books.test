<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BookFormRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('name', "ASC")->get();

        foreach ($books as $book) {
            $book['authors'] = Book::find($book['id'])->authors;
        }


        return view('admin.books', [
            "books" => $books,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::orderBy('last_name', "ASC")->get();

        return view('admin.book_create', [
            "authors" => $authors
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BookFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookFormRequest $request)
    {
        $book = Book::create($request->validated());

        $authors = array_diff($request->validated()['authors_id'], [0]);
        if ($authors) {
            foreach ($authors as $author){
                $book->authors()->attach($author);
            }
        }


        return redirect(route('admin.books.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $book['authors'] = $book->authors;
        $authors = Author::orderBy('last_name', "ASC")->get();

        return view('admin.book_create', [
            "book" => $book,
            "authors" => $authors,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BookFormRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BookFormRequest $request, $id)
    {
        $book = Book::findOrFail($id);


        if ($request->validated()['change_authors'] == 'change_authors'){
            foreach ($book->authors as $author) {
                $author->books()->detach($book);
            }
            $authors = array_diff($request->validated()['authors_id'], [0]);
            if ($authors) {
                foreach ($authors as $author) {
                    $book->authors()->attach($author);
                }
            }
        }
        $book->update($request->validated());

        return redirect(route('admin.books.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if ($book->authors){
            foreach ($book->authors as $author) {
                $author->books()->detach($book);
            }
        }
        Book::destroy($id);
        return redirect(route('admin.books.index'));
    }
}
