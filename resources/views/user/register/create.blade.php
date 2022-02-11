@extends('layout.master')

@section('title', 'ユーザー登録')

@section('style')
    .error{
        color: red;
    }
@endsection

@section('content')
<form method="post" action="{{ route('user.register.store') }}">
    @csrf
    <div class="email">
        <label>
            メールアドレス
            <input type="text" id="email" name="email" value="{{ old('email') }}">
        </label>
        @error('email')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="first_name">
        <label>
            性
            <input type="text" id="firstName" name="first_name" value="{{ old('first_name') }}">
        </label>
        @error('first_name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="last_name">
        <label>
            名
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}">
        </label>
        @error('last_name')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="password">
        <label>
            パスワード
            <input type="password" id="password" name="password">
        </label>
        @error('password')
        <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="password_confirmation">
        <label>
            パスワード確認
            <input type="password" id="passwordConfirmation" name="password_confirmation">
        </label>
    </div>
    <button class="btn" type="submit">登録</button>
</form>
@endsection