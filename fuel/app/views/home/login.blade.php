@extends('template/template')

@section('content')

    <div class="has-text-centered">
        <h1 class="title">Connexion</h1>
        <p class="subtitle">Entrez vos informations de connexion</p>
    </div>
    <br>

    @if(Session::get_flash('connection_error', false, false))
        <div class="notification is-danger">
            Couple identifiant/Mot de passe inconnu. <br>
            Les informations de connexion entrée ne sont pas valables. <br>
            Essayez à nouveau.
        </div>
    @endif

    <form action="/login" method="POST">
        <div class="field">
            <p class="control">
                <label for="username" class="label">Identifiant</label>
                <input class="input" type="text" name="username" id="username">
            </p>
        </div>
        <div class="field">
            <p class="control">
                <label for="password" class="label">Mot de passe</label>
                <input class="input" type="password" name="password" id="password">
            </p>
        </div>
        <div class="field">
            <p class="control has-text-right">
                <button class="button is-link">
                    Connexion
                </button>
            </p>
        </div>
    </form>

@endsection