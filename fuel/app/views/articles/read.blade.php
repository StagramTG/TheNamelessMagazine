@extends('template/template')

@section('content')

    <div class="columns is-centered">
        <div class="column is-8-desktop">
            <figure class="image is-clipped" style="max-height: 50vho">
                <img src="{{ $article->image }}">
            </figure>
            <h1 class="title">{{ $article->title }}</h1>

            <div class="content">
                {!! $article->content !!}
            </div>
        </div>
    </div>

@endsection