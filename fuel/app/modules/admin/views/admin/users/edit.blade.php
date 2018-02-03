@extends('admin/default/template')

@section('content')
    <h1 class="title">Utilisateurs</h1>
    <p class="subtitle">Edition d'un utilisateur</p>

    <form action="/admin/users/edit" method="POST">

        <div class="field">
            <p class="control">
                <label for="username" class="label">Nom de l'utilisateur (Affiché sur le site)</label>
                <input class="input" type="text" name="username" id="username" value="{{-- $article != null ? $article->title: "" --}}">
            </p>
        </div>

        <div class="field">
            <p class="control">
                <label for="email" class="label">Adresse email</label>
                <input class="input" type="email" name="email" id="email" value="{{-- $article != null ? $article->title: "" --}}">
            </p>
        </div>

        <div class="field">
            <p class="control">
                <label for="password" class="label">Mot de passe</label>
                <input class="input" type="password" name="password" id="password" value="{{-- $article != null ? $article->title: "" --}}">
            </p>
        </div>

        <div class="field">
            <p class="control">
                <button class="button is-link is-outlined">Enregistrer</button>
            </p>
        </div>

    </form>
@endsection