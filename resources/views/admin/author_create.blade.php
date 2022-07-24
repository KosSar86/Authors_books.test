@extends('layouts.admin')

@section('page-title'){{ isset($author) ? 'Редактирование данных автора' : 'Добавление нового автора' }}@endsection

@section('content')
    <h2>{{isset($author) ? 'Редактирование данных автора' : 'Добавление нового автора'}}</h2>
    <div>
        <form method="POST" action="{{ isset($author) ? route('admin.authors.update', $author->id) : route('admin.authors.store') }}">
            @csrf

            @if(isset($author))
                @method('PUT')
            @endif

            Имя: <input type="text" name="first_name" class="w-full h-12 border border-red-500 rounded px-3 " value="{{isset($author) ? $author->first_name : ''}}" placeholder="Введите имя автора">
            @error('login')
            <p class="text-red-500">{{ $message }}</p>
            @enderror

            Фамилия: <input type="text" name="last_name" class="w-full h-12 border border-red-500 rounded px-3 " value="{{isset($author) ? $author->last_name : ''}}" placeholder="Введите фамилию автора">
            @error('login')
            <p class="text-red-500">{{ $message }}</p>
            @enderror

            <button type="submit">Сохранить</button>
        </form>
    </div>
@endsection
