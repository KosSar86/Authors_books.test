@extends('layouts.admin')

@section('page-title')Список авторов@endsection

@section('content')
    <a href="{{ route('admin.authors.create') }}" class="text-indigo-600"><h2>Добавить нового автора в базу данных</h2></a>
    <h2>Список авторов</h2>
    <ol class="list-decimal">
        @foreach($authors as $author)
            <div class="el_in_list">{{ $author->last_name }} {{ $author->first_name }}.Количество книг: {{ $author->books_count }}
                <div class="el_edit_menu">
                    <a href="{{ route('admin.authors.edit', $author->id) }}" class="text-indigo-600">Редактировать</a>
                    <form method="POST" action="{{ route('admin.authors.destroy', $author->id) }}" >
                        @csrf
                        @method('DELETE')
                        <button type="submit" >Удалить</button>
                    </form>
                </div>
            </div>
        @endforeach
    </ol>
@endsection
@section('aside')
    @parent
    <a href="{{route('admin.books.index')}}" ><div><h2>Книги</h2></div></a>
@endsection

