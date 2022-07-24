@extends('layouts.admin')

@section('page-title')Список книг@endsection

@section('content')
    <a href="{{ route('admin.books.create') }}" class="text-indigo-600"><div class="tcf"><h2>Добавить книгу в базу данных</h2></div></a>
    <h2>Список книг</h2>
        @foreach($books as $book)
            <div class="el_in_list">{{$book->name}}
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
                <div class="el_edit_menu">
                    <a href="{{ route('admin.books.edit', $book->id) }}" class="text-indigo-600">Редактировать</a>
                    <form method="POST" action="{{ route('admin.books.destroy', $book->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
@endsection
@section('aside')
    @parent
    <a href="{{route('admin.authors.index')}}" ><div><h2>Авторы</h2></div></a>
@endsection

