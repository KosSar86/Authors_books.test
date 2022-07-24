<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthorFormRequest;
use App\Models\Author;
use App\Models\Book;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::orderBy('last_name', "ASC")->get();

        foreach ($authors as $author) {
            $author['books_count'] = count(Author::find($author['id'])->books);
        }

        return view('admin.authors', [
            'authors' => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  AuthorFormRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorFormRequest $request)
    {
        $authors = Author::create($request->validated());

        return redirect(route('admin.authors.index'));
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
        $author = Author::findOrFail($id);

        return view('admin.author_create', [
            "author" => $author,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  AuthorFormRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorFormRequest $request, $id)
    {
        $author = Author::findOrFail($id);
        $author->update($request->validated());

        return redirect(route('admin.authors.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        if ($author->books){
            foreach ($author->books as $book) {
                $book->authors()->detach($author);
            }
        }
        Author::destroy($id);
        return redirect(route('admin.authors.index'));
    }
}
