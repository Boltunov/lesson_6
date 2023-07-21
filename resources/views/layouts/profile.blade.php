@extends('admin.main')

@section('content')
    <h1>Изменения учетных данных</h1>
    <form action="{{ route('admin.updateProfile') }}" method="post">
        @csrf

        @if($erros->has('name'))
            <div class="alert alert-danger">
                @foreach($error->get('name') as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="name" placeholder="E-Mail" value="{{ $user->name }}"> <br>

        @if($errors->has('email'))
            <div class="alert alert-danger">
                @foreach($error->get('email') as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <input class="form-control" name="email" placeholder="E-Mail" value="{{ $user->email }}"> <br>
        @if($errors->has('password'))
            <div class="alert alert-danger">
                @foreach($error->get('password') as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="password" type="password" placeholder="Текущий пароль"> <br>

        @if($errors->has('newPassword'))
            <div class="alert alert-danger">
                @foreach($error->get('newPassword') as $error)
                    <p style="color: red;">{{ $error }}</p>
                @endforeach
            </div>
        @endif
        <input class="form-control" name="newPassword" type="newPassword" placeholder="Новый пароль"> <br>

        <button class="form-control" type="submit">
            Изменить
        </button>
    </form>
@endsection
