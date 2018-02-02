@extends('template/template')

@section('content')
    <h1 class="title">Articles</h1>

    @foreach($articles as $i => $article)
        <div class="notification">
            <article class="media">
                <figure class="media-left">
                    <p class="image is-128x128 is-clipped">
                        <img src="{{ $article->image }}">
                    </p>
                </figure>
                <div class="media-content">
                    <p class="subtitle">
                        <span class="tag is-white">{{ $article->categories->name }}</span>
                        {{ $article->title }}
                    </p>

                    <div>par {{ $article->users->username }}</div>
                    <div class="is-flex" style="justify-content: space-between;">
                        <div>
                            <span>{{ date('d/m/Y', $article->created_at) }}</span>
                        </div>

                        <div>
                            <a href="#" class="button is-link is-outlined">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    @endforeach
@endsection