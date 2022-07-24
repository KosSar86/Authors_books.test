@extends('layouts.app')

@section('page-title')Список книг@endsection

@section('content')
    @include('partials.header')
    <h2>Список книг</h2>
    <ol class="list-decimal">
        @foreach($books as $book)
            <li>{{$book->name}}
                @switch(count($book->authors))
                    @case(null)
                        Автор неизвестен
                        @break
                    @case(1)
                        Автор:@include('partials.book_authors')
                        @break
                    @default
                        Авторы:@include('partials.book_authors')
                @endswitch
            </li>
        @endforeach
    </ol>
@endsection

@section('aside')
    @parent

    <a href="{{route('authors_list')}}" ><div><h2>Авторы</h2></div></a>
@endsection
