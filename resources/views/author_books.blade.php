@extends('layouts.app')

@section('page-title')Книги автора@endsection

@section('content')
    @include('partials.header')

    <h2>Книги автора {{ implode(' ',$author) }}:</h2>
    <ol class="list-decimal">
        @foreach($books as $book)
            <li>{{{ $book->name }}}</li>
        @endforeach
    </ol>
@endsection

@section('aside')
    @parent
    <a href="{{route('books_list')}}" ><div><h2>Книги</h2></div></a>
    <a href="{{route('authors_list')}}" ><div><h2>Авторы</h2></div></a>
@endsection
