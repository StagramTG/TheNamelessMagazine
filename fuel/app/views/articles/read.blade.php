@extends('template/template')

@section('content')

    <h1 class="title">{{ $article->title }}</h1>

    <div class="content">
        {!! $article->content !!}
    </div>

@endsection