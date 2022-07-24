@extends('layouts.app')

@section('page-title')Список авторов@endsection

@section('content')
    @include('partials.header')
    <h2>Список авторов</h2>
    <ol class="list-decimal">
        @foreach($authors as $author)
            <li><a href="{{ route('author_books') }}?ID={{ $author->id }} ">{{ $author->last_name }} {{ $author->first_name }} </a>.Количество книг: {{ $author->books_count }}</li>
        @endforeach
    </ol>
@endsection

@section('aside')
    @parent
    <a href="{{route('books_list')}}" ><div><h2>Книги</h2></div></a>

@endsection
