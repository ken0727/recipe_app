@extends('layouts.app') <!-- layout.appを継承 -->
@section('title', 'ログイン')<!-- タブに表示される -->


@section('content')
<h1>Index Page for User ID: {{ $user_id }}</h1>

@endsection