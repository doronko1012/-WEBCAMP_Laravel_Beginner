@extends('layout')

{{--メインコンテンツ --}}
@section('contents')
        <h1>ログイン</h1>
        @if ($errors ->any())
            <div>
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
            </div>
        @endif
        <form action="/login" method="post">
            @csrf
            email：<input type="text" name="email" value="{{ old('email') }}"><br>
            パスワード：<input type="password" name="password"><br>
            <button>ログインする</button><br>
            <a href=".html">会員登録（未実装）</a>
        </form>
@endsection