@extends('layout.master')

@section('title', 'ユーザー登録が完了しました')

@section('content')
<a href="{{ route('user.register.create') }}">戻る</a>
@endsection