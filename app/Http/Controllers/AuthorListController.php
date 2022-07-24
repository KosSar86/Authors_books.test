<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorListController extends Controller
{
    public function index()
    {

        $authors = Author::orderBy('last_name', "ASC")->get();

        foreach ($authors as $author) {
            $author['books_count'] = count(Author::find($author['id'])->books);
        }
        return view('authors_list', [
            'authors' => $authors
        ]);
    }
}
