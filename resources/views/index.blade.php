@extends('layout')

{{--メインコンテンツ --}}
@section('contents')
        <title>ログイン機能付きタスク管理サービス</title>
    </head>
    <body>
        <h1>ログイン</h1>
        <form action="/login" method="post">
            email：<input type="text" name="email"><br>
            パスワード：<input type="password" name="password"><br>
            <button>ログインする</button>
        </form>
 @endsection