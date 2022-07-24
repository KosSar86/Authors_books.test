@extends('layouts.admin')

@section('page-title'){{ isset($book) ? 'Редактирование книги' : 'Добавление книги' }}@endsection

@section('content')
    <h2>{{isset($book) ? 'Редактирование книги' : 'Добавить книгу в базу данных'}}</h2>
    <div class="create_form">
        <form method="POST" action="{{ isset($book) ? route('admin.books.update', $book->id) : route('admin.books.store') }}">
            @csrf

            @if(isset($book))
                @method('PUT')
            @endif

            Введите название книги: <input type="text" name="name" class="book_name_create" value="{{isset($book) ? $book->name : ''}}" placeholder="Введите название книги">
            @error('login')
            <p class="text-red-500">{{ $message }}</p>
            @enderror
            @if(isset($book))
                <div class="radio_block">
                    Сейчас в базе данных авторами книги значатся:
                    @foreach($book->authors as $author)
                        <span>{{ $author->last_name }} {{ $author->first_name }}, </span>
                    @endforeach
                    <div class="radio">
                        <input type="radio" name="change_authors" id="without_change" value="without_change" checked>
                        <label for="without_change">Оставить авторов без изменений</label>
                        <input type="radio" name="change_authors" id="change_authors" value="change_authors">
                        <label for="change_authors">Загрузить в базу данных новые данные</label>
                    </div>
                </div>
            @endif
            <div class="select_authors">
                Выберите авторов из списка: <select name="authors_id[]" size="5" multiple>
                <option selected value="0"> </option>
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->last_name }} {{ $author->first_name }} </option>
                @endforeach
                </select>
                * по умолчанию автор не указан, можно выбрать нескольких авторов
            </div>
            <button class="save_button" type="submit">Сохранить</button>
        </form>
    </div>
@endsection
