@extends('template/template')

@section('content')

    <div class="columns is-centered">
        <div class="column is-8-desktop">
            <figure class="image">
                <img src="{{ $article->image }}">
            </figure>
            <h1 class="title has-text-centered">{{ $article->title }}</h1>

            <div class="content">
                {!! $article->content !!}
            </div>

            <div class="notification">
                Article par {{ $article->users->username }}
                dans la catégorie {{$article->categories->name }}
            </div>
        </div>
    </div>

@endsection