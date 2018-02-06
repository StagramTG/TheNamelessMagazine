@extends('admin/account/user')

@section('tabcontent')

    @if(Session::get_flash('update_success', false, true))
        <div class="notification is-success">
            Compte mit à jour avec succès !
        </div>
    @endif

    @if(Session::get_flash('update_fail', false, true))
        <div class="notification is-danger">
            Erreur lors de la mise à jour du compte...
        </div>
    @endif

    <form action="/admin/account/updateuser" method="POST">

        <div class="field">
            <label for="email">Adresse mail</label>
            <div class="control">
                <input class="input" type="text" name="email" id="email" value="{{ Auth::get('email') }}">
            </div>
        </div>

        <div class="field">
            <div class="control">
                <button class="button is-link">Enregistrer</button>
            </div>
        </div>
    </form>

@endsection