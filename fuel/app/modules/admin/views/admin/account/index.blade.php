@extends('admin/default/template')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title">{{ Auth::get('username') }}</h1>
            <p class="subtitle">Gestion des paramètres du compte</p>
        </div>
        <div class="column has-text-right">
            <a href="#" class="button is-link">Modifier les informations du compte</a>
        </div>
    </div>

    <table class="table is-bordered is-striped is-hoverable is-fullwidth">
        <thead>
        <th>Derniers articles rédigés</th>
        </thead>

        @foreach($articles as $i => $article)
            <tr>
                <td>
                    @if($article->draft)
                        <span class="tag is-warning">Brouillon</span>
                    @else
                        <span class="tag is-link">Publié</span>
                    @endif
                    <a href="/admin/articles/edit?id={{ $article->id }}">{{ $article->title }}</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection