@extends('admin/default/template')

@section('content')

    <div class="columns">
        <div class="column">
            <div class="notification is-info">
                Nombre de visiteurs
            </div>
        </div>

        <div class="column">
            <div class="notification is-success">
                autre infos
            </div>
        </div>

        <div class="column">
            <div class="notification is-warning">
                autre infos aussi...
            </div>
        </div>
    </div>

    <div class="columns">

        <div class="column is-8-desktop">
            <div class="notification">
                <div class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <p class="subtitle">Bienvenue {{ \Auth::get('username') }}</p>
                        </div>
                    </div>

                    <div class="level-right">
                        <div class="level-item">
                            <a href="#" class="button is-link">Espace perso</a>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <table class="table is-bordered is-striped is-hoverable is-fullwidth">

                    <thead>
                        <th colspan="3">Derniers commentaires</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td>[Bidule] Bidule : contenu du commentaire c'est trop bien lolilol !</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="column is-4-desktop">
            <table class="table is-bordered is-striped is-hoverable is-fullwidth">
                <thead>
                    <th>Derniers articles</th>
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
        </div>

    </div>

@endsection