@extends('layouts.admin')

@section('page-title')Панель администратора@endsection

@section('aside')
    @parent
    <a href="{{route('admin.books.index')}}" ><div><h2>Книги</h2></div></a>
    <a href="{{route('admin.authors.index')}}" ><div><h2>Авторы</h2></div></a>
@endsection
