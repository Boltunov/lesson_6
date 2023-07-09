@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
    </div>
    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.categories.update', ['category' =>$categories]) }}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $categories->title }}" />
            @error('title') <x-alert type="danger" :message="$message"></x-alert> @enderror
        </div>
        <div class="form-group">
            <label for="news">Новости</label>
            <select class="form-control" multiple name="news[]" id="news">
                @foreach($news as $new)
                    <option @if(in_array($new->id, $categories->news->pluck('id')->toArray())) selected @endif value="{{ $new->id }}">{{ $new->title }}</option>
                @endforeach
            </select>
            @error('categories') <x-alert type="danger" :message="$message"></x-alert> @enderror
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control" />
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $categories-> description !!}</textarea>
        </div>
        <br/>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
