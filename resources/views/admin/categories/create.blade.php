@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
    </div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}" />
            @error('title') <strong style="color: red;">{{ $message }}</strong> @enderror
        </div>
        <div class="form-group">
            <label for="categories">Новости</label>
            <select class="form-control" multiple name="news[]" id="news">
                @foreach($news as $new)
                    <option value="{{ $new->id }}">{{ $new->title }}</option>
                @endforeach
            </select>
            @error('categories') <strong style="color: red;">{{ $message }}</strong> @enderror
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control" />
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
