@extends('../template/template')

@section('content')

    <div class="columns">
    @foreach(array_slice($articles, 0, 3) as $i => $article)

        <div class="column is-4-desktop">
            <div class="card">
                <div class="card-image">
                    <figure class="image">
                        <img src="{{ $article->image }}">
                    </figure>
                    <div class="card-item">
                        {{ $article->categories->name }}
                    </div>
                </div>
                <div class="card-content">
                    <div class="content">
                        <p class="subtitle is-4 has-text-centered">{{ $article->title }}</p>

                        <div>par {{ $article->users->username }}</div>
                        <div class="is-flex" style="justify-content: space-between;">
                            <span>{{ date('d/m/Y', $article->created_at) }}</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="/articles/read?id={{ $article->id }}" class="card-footer-item" style="width: 100%;">Lire l'article</a>
                </div>
            </div>
        </div>

    @endforeach
    </div>

    @foreach(array_slice($articles, 3) as $i => $article)
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
                            <a href="/articles/read?id={{ $article->id }}" class="button is-link is-outlined">Lire l'article</a>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    @endforeach

    <div class="has-text-centered">
        <a href="/articles" class="button is-link is-outlined">Voir plus d'articles</a>
    </div>

@endsection
