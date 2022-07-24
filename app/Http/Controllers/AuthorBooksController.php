<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorBooksController extends Controller
{
    public function index()
    {

        $books = Author::find($_GET['ID'])->books;
        $author = [Author::find($_GET['ID'])->first_name, Author::find($_GET['ID'])->last_name];

        return view('author_books', [
            "books" => $books,
            "author" => $author,
        ]);
    }
}
