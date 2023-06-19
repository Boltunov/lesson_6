@extends('layouts.admin')
@section('content')
    <h1 class="h2">Выгрузка</h1>
    @if($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <form method="post" action="{{ route('admin.discharge.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <h2>ФИО</h2><br>
                <input type="text" name="fio" id="fio" class="form-control" value="{{ old('text') }}">
            </div>
            <div class="form-group">
                <h2>Телефон</h2><br>
                <input type="tel" name="number" id="number" class="form-control" value="{{ old('number') }}">
            </div>
            <div class="form-group">
                <h2>Email</h2><br>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <h2>Информация</h2><br>
                <input type="text" name="info" id="info" class="form-control" value="{{ old('info') }}">
            </div><br>
            <button type="submit" class="btn btn-success">Выгрузить</button>
        </form>
    </div>
@endsection
