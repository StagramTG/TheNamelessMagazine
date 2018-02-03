@extends('admin/default/template')

@section('content')
    <div class="columns">
        <div class="column">
            <h1 class="title">Articles</h1>
            <p class="subtitle">Gestion des articles</p>
        </div>

        <div class="column has-text-right">
            <a href="/admin/articles/edit" class="button is-success">Nouvel article</a>
        </div>
    </div>

    <table class="table is-bordered is-striped is-hoverable is-fullwidth">

        <thead>
        <tr>
            <th>Titre</th>
            <th>Date de création</th>
            <th>Catégorie</th>
            <th colspan="3">Autres</th>
        </tr>
        </thead>

        <tbody>
            @foreach($articles as $i => $article)
                <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ date('d/m/Y H:i', $article->created_at) }}</td>
                    <td>{{ $article->categories->name }}</td>
                    <td>{!! $article->draft == 1 ? '<span class="tag is-warning">Brouillon</span>': '<span class="tag is-link">Publié</span>' !!}</td>
                    <td><a href="/admin/articles/edit?id={{ $article->id }}">modifier</a></td>
                    <td><a href="javascript:void(0)" onclick="deleteArticle({{ $article->id }})">supprimer</a></td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <div class="modal" id="delete-modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <section class="modal-card-body">
                <h1 class="title">Suppression de l'article</h1>
                <p class="subtitle">
                    La suppression d'un article est définitive et irréversible !
                </p>

                <form action="/admin/articles/delete" method="POST">
                    <input type="text" hidden value="" id="article-id" name="id">
                    <button type="submit" class="button is-danger">Supprimer</button>
                    <button type="button" class="button is-link" onclick="toggleModal()">Annuler</button>
                </form>
            </section>
        </div>
    </div>
@endsection

@section('scripts')
    {!! Asset::js('admin/articles/index.js') !!}
@endsection