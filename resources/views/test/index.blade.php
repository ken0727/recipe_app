@extends('layouts.app')

@section('title', 'Test Page')

@section('content')

    <!-- 検索フォーム -->
    <x-search :url="url('/test/search')" :results="$posts ?? []" searchType="" />



@endsection
