<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BooksListController extends Controller
{

    public function index()
    {

        $books = Book::orderBy('name', "ASC")->get();

        foreach ($books as $book) {
            $book['authors'] = Book::find($book['id'])->authors;
        }
        return view('books_list', [
            "books" => $books
        ]);
    }
}
