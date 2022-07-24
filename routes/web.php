<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/books-list', [
    \App\Http\Controllers\BooksListController::class, 'index'
])->name('books_list');;

Route::get('/authors-list', [
    \App\Http\Controllers\AuthorListController::class, 'index'
])->name('authors_list');;

Route::get('/author-books', [
    \App\Http\Controllers\AuthorBooksController::class, 'index'
])->name('author_books');;
