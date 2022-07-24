@extends('layouts.app')

@section('page-title')Главная страница@endsection

@section('content')
    <h1>Авторы и книги</h1>
@endsection

@section('aside')
    @parent
    <a href="{{route('books_list')}}" ><div><h2>Книги</h2></div></a>
    <a href="{{route('authors_list')}}" ><div><h2>Авторы</h2></div></a>
@endsection
